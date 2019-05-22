<?php

namespace Api\Repository;

use Api\Lib\PdoTrait;

class EntrepriseRepository
{
    use PdoTrait;

    /**
     * @param $object
     * @return array
     */
    public function getAttributesOf($object)
    {
        $entity = [];
        foreach ($object as $property => $value) {
            $entity[$property] = $value;
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
