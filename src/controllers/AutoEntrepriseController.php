<?php

namespace Api\Controllers;

use Api\Models\AutoEntreprise;

class AutoEntrepriseController extends RestController
{
    /** @var AutoEntreprise $entreprise */
    private $entreprise;
    /** @var array $entreprises */
    private $entreprises;

    /** @param int $id */
    public function getDetailRequest(int $id): void
    {
        $data = [];
        echo json_encode($data);
    }

    public function getAllRequest(): void
    {
        $data = [];
        echo json_encode($data);
    }

    /** @param array $post */
    public function addRequest(array $post = []): void
    {
        echo "L'entreprise a bien été ajoutée";
    }

    /**
     * @param int $id
     * @param $post
     */
    public function updateRequest(int $id, $post): void
    {
        echo "L'entreprise a bien été modifiée";
    }

    /** @param int $id */
    public function deleteRequest(int $id): void
    {
        echo "L'entreprise a bien été supprimée";
    }
}
