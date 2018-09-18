<?php

require_once '../lib/Library.php';
require_once './EntrepriseModel.php';

class AutoEntreprise extends Entreprise
{
	public $fields = [
		'siret',
		'denomination',
		'chiffre_affaire',
		'type',
	];

	const TYPE = "AE";
	const TAUX = 0.25;

	public function __construct($data = [], $tableName = self::TABLE_NAME)
	{
		$this->setTableName($tableName);
		$this->setDb();

		// Si présence de données, alors on hydrate...
		if (!empty($data)) {
			$this->setSiret($data['siret']);
			$this->setDenomination($data['denomination']);
			$this->setChiffreAffaire((Float) $data['chiffre_affaire']);
			$this->setType();
		}
	}
}

$data = [
	'siret' => '362 521 879 00034',
	'denomination' => 'WebFactory',
	'chiffre_affaire' => 1200000.26,
];

$entreprise = new AutoEntreprise($data);
$entreprise->add();