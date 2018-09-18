<?php

require_once '../lib/Library.php';
require_once './EntrepriseModel.php';

class AutoEntreprise extends Entreprise
{
	const TYPE = "AE";
	const TAUX = 0.25;

	public function __construct($data = [], $tableName = self::TABLE_NAME)
	{
		$this->setTableName($tableName);
		$this->setDb();

		// Si présence de données, alors on hydrate...
		if (!empty($data)) {
			$this->setEntrepriseId((Integer) $data['entreprise_id']);
			$this->setSiret($data['siret']);
			$this->setDenomination($data['denomination']);
			$this->setChiffreAffaire((Float) $data['chiffre_affaire']);
			$this->setType();
		}
	}
}

$entrepriseAE = new AutoEntreprise;
// $entrepriseAE = $entrepriseAE->getOne(6);
// $entrepriseAE = $entrepriseAE->getSelected([1,2,3,4,5,6,7,8,9,10]);
$entrepriseAE = $entrepriseAE->getAll();

var_dump($entrepriseAE);