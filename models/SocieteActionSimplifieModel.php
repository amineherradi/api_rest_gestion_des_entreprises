<?php

require_once './lib/Library.php';
require_once './models/EntrepriseModel.php';

class SocieteActionSimplifie extends Entreprise
{
	public $fields = [
		// 'entreprise_id'        => 'getEntrepriseId',
		'siret'                => 'getSiret',
		'denomination'         => 'getDenomination',
		'adresse_siege_social' => 'getAdresseSiegeSocial',
		'chiffre_affaire'      => 'getChiffreAffaire',
		'type'                 => 'getType',
	];

	protected $adresse_siege_social;

	const TYPE = "SAS";
	const TAUX = 0.33;

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
			$this->setAdresseSiegeSociale($data['adresse_siege_social']);
		}
	}

	public function setAdresseSiegeSociale($adresse_siege_social)
	{
		if (Library::is_valid_adresse_siege_social($adresse_siege_social)) {
			$this->adresse_siege_social = $adresse_siege_social;
		} else {
			throw new Exception("Adresse siege social not valid", 1);
		}
	}

	public function getAdresseSiegeSocial()
	{
		return $this->adresse_siege_social;
	}
}