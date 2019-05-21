<?php

namespace Controllers;

use Models\SocieteActionSimplifie;
use phpDocumentor\Reflection\Types\Integer;

class SocieteActionSimplifieController extends RestController
{
    /** @var SocieteActionSimplifie $entreprise */
    private $entreprise;
    /** @var SocieteActionSimplifie $entreprises */
    private $entreprises;

    /** @param $id */
    public function getDetailRequest($id): void
    {
        $this->entreprise = new SocieteActionSimplifie;
        $this->entreprise = $this->entreprise->getOne($id);

        $data = [];
        foreach ($this->entreprise as $attribut => $getter) {
            $data[$attribut] = $this->entreprise->$getter();
        }

        $data['impot'] = $this->entreprise->getChiffreAffaire() * $this->entreprise::TAUX;
        echo json_encode($data);
    }

    public function getAllRequest(): void
    {
        $this->entreprises = new SocieteActionSimplifie;
        $this->entreprises = $this->entreprise->getAll();

        $data = [];

        /** @var SocieteActionSimplifie $entreprise */
        foreach ($this->entreprises as $key => $entreprise) {
            $data[$this->entreprise->getEntrepriseId()] = [];
            foreach ($entreprise as $attribut => $getter) {
                if (array_key_exists($attribut, $entreprise->fields)) {
                    $data[$entreprise->getEntrepriseId()][$attribut] = $entreprise->$getter();
                }
            }

            $data[$entreprise->getEntrepriseId()]['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
        }
        echo json_encode($data);
    }

    /** @param array $post */
    public function addRequest(array $post = []): void
    {
        $entreprise = new SocieteActionSimplifie($post);
        if ($entreprise->add()) {
            echo "L'entreprise a bien été ajoutée";
        }
    }

    /**
     * @param Integer $id
     * @param $patch
     */
    public function updateRequest(Integer $id, $patch): void
    {
        $entreprise = new SocieteActionSimplifie($patch);
        if ($entreprise->update($id)) {
            echo "L'entreprise a bien été modifiée";
        }
    }

    /** @param Integer $id */
    public function deleteRequest(Integer $id): void
    {
        $entreprise = new SocieteActionSimplifie;
        if ($entreprise->delete($id)) {
            echo "L'entreprise a bien été supprimée";
        }
    }
}
