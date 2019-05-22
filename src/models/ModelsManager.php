<?php

namespace Models;

use PDO;
use phpDocumentor\Reflection\Types\Integer;

class ModelsManager
{
    /** @var PDO $db */
    protected $db;
    /** @var string $tableName */
    protected $tableName;

    protected function setDb()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    }

    /**
     * @param $object
     * @return array
     */
    public function getAttributesOf($object)
    {
        $entity = [];
        foreach ($object as $attribut => $value) {
            $entity[$attribut] = $value;
        }
        return $entity;
    }

    /**
     * @param int $id
     * @return bool;
     */
    public function getOne(int $id)
    {
        return ($id) ? true : false;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function getSelected(array $ids = [])
    {
        return ($ids) ? [] : [];
    }

    /** @return array */
    public function getAll()
    {
        return [];
    }

    /** @return bool */
    public function add()
    {
        return true;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function update(int $id)
    {

        return ($id) ? true : false;
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id)
    {
        return ($id) ? true : false;
    }
}
