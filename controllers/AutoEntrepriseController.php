<?php

namespace Controllers;

class AutoEntrepriseController extends RestController
{
    /***/
    private $entreprise;

    public function getDetail_request($id)
    {
        $entreprise = new AutoEntreprise;
        $entreprise = $entreprise->getOne($id);

        $data = [];
        foreach ($entreprise->fields as $attribut => $getter) {
            if(array_key_exists($attribut, $entreprise->fields)) {
                $data[$attribut] = $entreprise->$getter();
            }
        }

        // L'impôt est uniquement calculé, et n'est jamais stocké
        $data['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
        echo json_encode($data);
    }

    public function getAll_request()
    {
        $entreprises = new AutoEntreprise;
        $entreprises = $entreprises->getAll();

        foreach ($entreprises as $key => $entreprise) {
            $data[$entreprise->getEntrepriseId()] = [];
            foreach ($entreprise->fields as $attribut => $getter) {
                if(array_key_exists($attribut, $entreprise->fields)) {
                    $data[$entreprise->getEntrepriseId()][$attribut] = $entreprise->$getter();
                }
            }

            // L'impôt est uniquement calculé, et n'est jamais stocké
            $data[$entreprise->getEntrepriseId()]['impot'] = $entreprise->getChiffreAffaire() * $entreprise::TAUX;
        }
        echo json_encode($data);
    }

    public function add_request($post = [])
    {
        $entreprise = new AutoEntreprise($post);
        if ($entreprise->add()) {
            echo "L'entreprise a bien été ajoutée";
        }
    }

    public function update_request($id, $post)
    {
        $entreprise = new AutoEntreprise($post);
        if ($entreprise->update($id)){
            echo "L'entreprise a bien été modifiée";
        }
    }

    public function delete_request($id)
    {
        $entreprise = new AutoEntreprise;
        if ($entreprise->delete($id)) {
            echo "L'entreprise a bien été supprimée";
        }
    }
}