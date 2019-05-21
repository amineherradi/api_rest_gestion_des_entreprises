<?php

namespace Controllers;

use Models\SocieteActionSimplifie;

class SocieteActionSimplifieController extends RestController
{
    /** @var SocieteActionSimplifie $entreprise */
    private $entreprise;
    /** @var SocieteActionSimplifie $entreprises */
    private $entreprises;

    public function getDetail_request($id)
    {
        $this->entreprise = new SocieteActionSimplifie;
        $this->entreprise = $this->entreprise->getOne($id);

        $data = [];
        foreach ($this->entreprise as $attribut => $getter) {
            $data[$attribut] = $this->entreprise->$getter();
        }

        // L'impôt est uniquement calculé, et n'est jamais stocké
        $data['impot'] = $this->entreprise->getChiffreAffaire() * $this->entreprise::TAUX;
        echo json_encode($data);
    }

    public function getAll_request()
    {
        $this->entreprises = new SocieteActionSimplifie;
        $this->entreprises = $this->entreprise->getAll();

        $data = [];

        /** @var SocieteActionSimplifie $entreprise */
        foreach ($this->entreprises as $key => $entreprise) {
            $data[$this->entreprise->getEntrepriseId()] = [];
            foreach ($entreprise as $attribut => $getter) {
                if(array_key_exists($attribut, $entreprise->fields)) {
                    $data[$entreprise->getEntrepriseId()][$attribut] = $entreprise->$getter();
                }
            }

            $data[$entreprise->getEntrepriseId()]['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
        }
        echo json_encode($data);
    }

    public function add_request($post = [])
    {
        $entreprise = new SocieteActionSimplifie($post);
        if ($entreprise->add()) {
            echo "L'entreprise a bien été ajoutée";
        }
    }

    public function update_request($id, $patch)
    {
        $entreprise = new SocieteActionSimplifie($patch);
        if ($entreprise->update($id)){
            echo "L'entreprise a bien été modifiée";
        }
    }

    public function delete_request($id)
    {
        $entreprise = new SocieteActionSimplifie;
        if ($entreprise->delete($id)) {
            echo "L'entreprise a bien été supprimée";
        }
    }
}