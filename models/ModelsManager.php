<?php

namespace Models;

use PDO;

class ModelsManager
{
    /** @var PDO $db */
    protected $db;
    /** @var string $tableName */
    protected $tableName;

    public function setDb()
    {
        $this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function setTableName($table_name)
    {
        $this->tableName = $table_name;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getAttributesOf($object)
    {
        $entity = [];
        foreach ($object as $attribut => $value) {
            $entity[$attribut] = $value;
        }

        return $entity;
    }

    public function getOne($id)
    {
        $sql = 'SELECT * ';
        $sql.= 'FROM '.$this->tableName.' ';
        $sql.= 'WHERE '.$this->tableName.'_id = '.$this->db->quote($id);

        $query = $this->db->query($sql);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        $class = get_called_class();
        $object = new $class($data);

        return $object;
    }

    public function getSelected($ids = [])
    {
        $sql = 'SELECT * ';
        $sql.= 'FROM '.$this->tableName.' ';
        $sql.= 'WHERE '.$this->tableName.'_id IN ('.implode(",", $ids).')';

        $query = $this->db->query($sql);

        $objects = [];
        $class = get_called_class();
        while ($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $objects[] = new $class($data);
        }

        return $objects;
    }

    public function getAll()
    {
        $sql = 'SELECT * ';
        $sql.= 'FROM '.$this->tableName.' ';

        $query = $this->db->query($sql);

        $objects = [];
        $class = get_called_class();
        while ($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $objects[] = new $class($data);
        }

        return $objects;
    }

    public function add()
    {
        $sql = 'INSERT INTO '.$this->tableName.' (';
            $sql.= implode(', ', array_keys($this->fields));
        $sql.= ') VALUES (';
            $sql.= ':'.implode(', :', array_keys($this->fields)).'';
        $sql.= ')';
        $query = $this->db->prepare($sql);

        foreach ($this->fields as $key => $field) {
            $query->bindValue(':'.$key, $this->$field(), PDO::PARAM_INT);
        }

        return $query->execute();
    }

    public function update($id)
    {
        $sql = 'UPDATE '.$this->tableName.' SET ';
        $i = 0;
        $limit = count($this->fields) - 1;
        foreach ($this->fields as $key => $field) {
            $sql.= $key.' = :'.$key;
            if ($i < $limit) {
                $sql.= ', ';
            }
            $i++;
        }
        $sql.= ' ';
        $sql.= 'WHERE entreprise_id = '.$this->db->quote($id);

        $query = $this->db->prepare($sql);

        foreach ($this->fields as $key => $field) {
            $query->bindValue(':'.$key, $this->$field(), PDO::PARAM_INT);
        }

        return $query->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM '.$this->tableName.' WHERE entreprise_id = '.$this->db->quote($id);
        return $this->db->exec($sql);
    }
}