<?php

require_once '../lib/Library.php';
require_once './ModelsManager.php';

class Entreprise extends ModelsManager
{
	protected $entreprise_id;
	protected $siret;
	protected $denomination;
	protected $chiffre_affaire;
	protected $type;

	const TABLE_NAME = "entreprise";

	public function setEntrepriseId($id)
	{
		if (Library::is_valid_id($id)){
			$this->entreprise_id = $id;
		} else {
			throw new Exception("Entreprise Id not valid", 1);
		}
	}

	public function setSiret($siret)
	{
		if (Library::is_valid_siret($siret)) {
			$this->siret = $siret;
		} else {
			throw new Exception("Siret not valid", 1);
		}
	}

	public function setDenomination($denomination)
	{
		if (Library::is_valid_denomination($denomination)) {
			$this->denomination = $denomination;
		} else {
			throw new Exception("Denomination not valid", 1);
		}
	}

	public function setChiffreAffaire($chiffre_affaire)
	{
		if (Library::is_valid_chiffre_affaire($chiffre_affaire))
		{
			$this->chiffre_affaire = $chiffre_affaire;
		} else {
			throw new Exception("Chiffre d'affaire not valid", 1);
		}
	}

	public function setType()
	{
		$this->type = $this::TYPE;
	}

	public function getEntrepriseId()
	{
		return $this->entreprise_id;
	}

	public function getSiret()
	{
		return $this->siret;
	}

	public function getDenomination()
	{
		return $this->denomination;
	}

	public function getChiffreAffaire()
	{
		return $this->chiffre_affaire;
	}

	public function getType()
	{
		return $this->type;
	}

	// Mes surcharges
	public function getOne($id)
	{
		$sql = 'SELECT * ';
		$sql.= 'FROM '.$this->table_name.' ';
		$sql.= 'WHERE '.$this->table_name.'_id = '.$id;
		$sql.= 'AND type = "'.$this::TYPE.'"';

		$query = $this->db->query($sql);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		
		$class = get_called_class();
		$object = new $class($data);

		return $object;
	}

	public function getSelected($ids = [])
	{
		$sql = 'SELECT * ';
		$sql.= 'FROM '.$this->table_name.' ';
		$sql.= 'WHERE '.$this->table_name.'_id IN ('.implode(",", $ids).') ';
		$sql.= 'AND type = "'.$this::TYPE.'"';

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
		$sql.= 'FROM '.$this->table_name.' ';
		$sql.= 'WHERE type = "'.$this::TYPE.'"';

		$query = $this->db->query($sql);

		$objects = [];
		$class = get_called_class();
		while ($data = $query->fetch(PDO::FETCH_ASSOC))
		{
			$objects[] = new $class($data);
		}

		return $objects;
	}
}

