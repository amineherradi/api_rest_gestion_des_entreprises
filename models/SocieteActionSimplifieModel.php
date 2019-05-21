<?php

namespace Models;

use Exception;

class SocieteActionSimplifie extends Entreprise
{
    const TYPE = "SAS";
    const TAUX = 0.33;

    /** @var string $adresseSiegeSocial */
    protected $adresseSiegeSocial;

    public function __construct($data = [])
    {
        $this->tableName = $this::TABLE_NAME;
        if (!empty($data)) {
            $this->entrepriseId       = (isset($data['entreprise_id']))? $data['entreprise_id']:"";
            $this->siret              = $data['siret'];
            $this->denomination       = $data['denomination'];
            $this->chiffreAffaire     = $data['chiffre_affaire'];
            $this->type               = $this::TYPE;
            $this->adresseSiegeSocial = $data['adresse_siege_social'];
        }
    }

    /**
     * @return string
     */
    public function getAdresseSiegeSocial()
    {
        return $this->adresseSiegeSocial;
    }

    /**
     * @param $adresseSiegeSocial
     * @throws Exception
     */
    public function setAdresseSiegeSociale($adresseSiegeSocial)
    {
        if ($this->isValidAddress($adresseSiegeSocial)) {
            $this->adresseSiegeSocial = $adresseSiegeSocial;
        } else {
            throw new Exception("Adresse siege social not valid", 1);
        }
    }
}