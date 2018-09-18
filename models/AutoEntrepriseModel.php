<?php

require_once './lib/Library.php';
require_once './models/EntrepriseModel.php';

class AutoEntreprise extends Entreprise
{
	public $fields = [
		'entreprise_id'   => 'getEntrepriseId',
		'siret'           => 'getSiret',
		'denomination'    => 'getDenomination',
		'chiffre_affaire' => 'getChiffreAffaire',
		'type'            => 'getType',
	];

	const TYPE = "AE";
	const TAUX = 0.25;

	public function __construct($data = [], $tableName = self::TABLE_NAME)
	{
		$this->setTableName($tableName);
		$this->setDb();

		// Si présence de données, alors on hydrate...
		if (!empty($data)) {
			if (isset($data['entreprise_id'])) {
				$this->setEntrepriseId((Integer) $data['entreprise_id']);
			}
			$this->setSiret($data['siret']);
			$this->setDenomination($data['denomination']);
			$this->setChiffreAffaire((Float) $data['chiffre_affaire']);
			$this->setType();
		}
	}
}