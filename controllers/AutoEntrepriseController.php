<?php

namespace Controllers;

use Models\AutoEntreprise;

class AutoEntrepriseController extends RestController
{
    /** @var AutoEntreprise $entreprise */
    private $entreprise;
    /** @var AutoEntreprise $entreprises */
    private $entreprises;

    /** @param $id */
    public function getDetailRequest($id)
    {
        $this->entreprise = new AutoEntreprise;
        $this->entreprise = $this->entreprise->getOne($id);

        $data = [];
        foreach ($this->entreprise as $attribut => $getter) {
            $data[$attribut] = $this->entreprise->$getter();
        }

        $data['impot'] = $this->entreprise->getChiffreAffaire() * $this->entreprise::TAUX;
        echo json_encode($data);
    }

    public function getAllRequest()
    {
        $data = [];
        $this->entreprises = new AutoEntreprise;
        $this->entreprises = $this->entreprises->getAll();

        /** @var AutoEntreprise $entreprise */
        foreach ($this->entreprises as $key => $entreprise) {
            $data[$entreprise->getEntrepriseId()] = [];
            foreach ($entreprise->fields as $attribut => $getter) {
                if(array_key_exists($attribut, $entreprise->fields)) {
                    $data[$entreprise->getEntrepriseId()][$attribut] = $entreprise->$getter();
                }
            }

            $data[$entreprise->getEntrepriseId()]['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
        }
        echo json_encode($data);
    }

    public function addRequest($post = [])
    {
        $entreprise = new AutoEntreprise($post);
        if ($entreprise->add()) {
            echo "L'entreprise a bien été ajoutée";
        }
    }

    public function updateRequest($id, $post)
    {
        $entreprise = new AutoEntreprise($post);
        if ($entreprise->update($id)){
            echo "L'entreprise a bien été modifiée";
        }
    }

    public function deleteRequest($id)
    {
        $entreprise = new AutoEntreprise;
        if ($entreprise->delete($id)) {
            echo "L'entreprise a bien été supprimée";
        }
    }
}
