<?php

require_once '../config/config.php';

class ModelsManager
{
	protected $db;
	protected $table_name;

	public function setDb()
	{
		$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
	}

	public function setTableName($table_name)
	{
		$this->table_name = $table_name;
	}

	public function getTableName()
	{
		return $this->table_name;
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
		$sql.= 'FROM '.$this->table_name.' ';
		$sql.= 'WHERE '.$this->table_name.'_id = '.$id;

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
		$sql.= 'WHERE '.$this->table_name.'_id IN ('.implode(",", $ids).')';

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
		$sql = 'INSERT INTO '.$this->table_name.' (';
			$sql.= implode(', ', $this->fields);
		$sql.= ') VALUES (';
			$sql.= ':'.implode(', :', $this->fields).'';
		$sql.= ')';
		$query = $this->db->prepare($sql);

		foreach ($this->fields as $key => $field) {
			$query->bindValue(':'.$field, $this->$field, PDO::PARAM_INT);
		}

		$query->execute();
	}

	public function update($id)
	{
		$sql = 'UPDATE '.$this->table_name.' SET ';
		$limit = count($this->fields) - 1;
		foreach ($this->fields as $key => $field) {
			$sql.= $field.' = :'.$field;
			if ($key < $limit) {
				$sql.= ', ';
			}
		}
		$sql.= ' ';
		$sql.= 'WHERE entreprise_id = '.$id;

		$query = $this->db->prepare($sql);

		foreach ($this->fields as $key => $field) {
			$query->bindValue(':'.$field, $this->$field, PDO::PARAM_INT);
		}

		$query->execute();
	}

	public function delete($id)
	{
		$sql = 'DELETE FROM '.$this->table_name.' WHERE entreprise_id = '.$id;
		$this->db->exec($sql);
	}
}