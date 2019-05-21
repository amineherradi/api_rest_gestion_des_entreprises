<?php

namespace Models;

use Exception;
use Lib\Validators;
use PDO;

abstract class Entreprise extends ModelsManager
{
    use Validators;

    const TABLE_NAME = "entreprise";

    /** @var integer $entrepriseId */
    protected $entrepriseId;
    /** @var string $siret */
    protected $siret;
    /** @var string $denomination */
    protected $denomination;
    /** @var float $chiffreAffaire */
    protected $chiffreAffaire;
    /** @var string */
    protected $type;

    /**
     * @return int
     */
    public function getEntrepriseId()
    {
        return $this->entrepriseId;
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function setEntrepriseId($id)
    {
        if ($this->isValidId($id)){
            $this->entrepriseId = $id;
        } else {
            throw new Exception("Entreprise Id not valid", 1);
        }
    }

    /**
     * @return string
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param $siret
     * @throws Exception
     */
    public function setSiret($siret)
    {
        if ($this->isValidSiret($siret)) {
            $this->siret = $siret;
        } else {
            throw new Exception("Siret not valid", 1);
        }
    }

    /**
     * @return string
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * @param $denomination
     * @throws Exception
     */
    public function setDenomination($denomination)
    {
        if ($this->isValidDenomination($denomination)) {
            $this->denomination = $denomination;
        } else {
            throw new Exception("Denomination not valid", 1);
        }
    }

    /**
     * @return float
     */
    public function getChiffreAffaire()
    {
        return $this->chiffreAffaire;
    }

    /**
     * @param $chiffre_affaire
     * @throws Exception
     */
    public function setChiffreAffaire($chiffre_affaire)
    {
        if ($this->isValidChiffreAffaire($chiffre_affaire)) {
            $this->chiffreAffaire = $chiffre_affaire;
        } else {
            throw new Exception("Chiffre d'affaire not valid", 1);
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType()
    {
        $this->type = $this::TYPE;
    }

    // Mes surcharges
    public function getOne($id)
    {
        $sql = 'SELECT * ';
        $sql.= 'FROM '.$this->tableName.' ';
        $sql.= 'WHERE '.$this->tableName.'_id = '.$this->db->quote($id).' ';
        $sql.= 'AND type = "'.$this->type.'"';

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
        $sql.= 'WHERE '.$this->tableName.'_id IN ('.implode(",", array_map('PDO::quote', $ids)).') ';
        $sql.= 'AND type = "'.$this->type.'"';

        $query = $this->db->query($sql);

        $objects = [];
        $class = get_called_class();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $objects[] = new $class($data);
        }

        return $objects;
    }

    public function getAll()
    {
        $sql = 'SELECT * ';
        $sql.= 'FROM '.$this->tableName.' ';
        $sql.= 'WHERE type = "'.$this->type.'"';

        $query = $this->db->query($sql);

        $objects = [];
        $class = get_called_class();
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $objects[] = new $class($data);
        }

        return $objects;
    }

    public function update($id)
    {
        $sql = 'UPDATE '.$this->tableName.' SET ';
        $i = 0;
        $limit = count($this->fields) - 1;
        foreach ($this as $key => $field) {
            $sql.= $key.' = :'.$key;
            if ($i < $limit) {
                $sql.= ', ';
            }
            $i++;
        }
        $sql.= ' ';
        $sql.= 'WHERE entreprise_id = '.$this->db->quote($id).' ';
        $sql.= 'AND type = "'.$this->type.'"';

        $query = $this->db->prepare($sql);
        foreach ($this as $key => $field) {
            $query->bindValue(':'.$key, $this->$key, PDO::PARAM_INT);
        }

        return $query->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM '.$this->tableName.' WHERE entreprise_id = '.$this->db->quote($id).' AND type = "'.$this->type.'"';
        return $this->db->exec($sql);
    }
}

