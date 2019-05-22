<?php

namespace Models;

use Exception;

class SocieteActionSimplifie extends Entreprise
{
    const TYPE = "SAS";
    const TAUX = 0.33;

    /** @var string $adresseSiegeSocial */
    protected $adresseSiegeSocial;

    /**
     * SocieteActionSimplifie constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->tableName = $this::TABLE_NAME;
        if (!empty($data)) {
            $this->entrepriseId       = (isset($data['entreprise_id'])) ? $data['entreprise_id'] : "";
            $this->siret              = $data['siret'];
            $this->denomination       = $data['denomination'];
            $this->chiffreAffaire     = $data['chiffre_affaire'];
            $this->type               = $this::TYPE;
            $this->adresseSiegeSocial = $data['adresse_siege_social'];
        }
    }

    /** @return string */
    public function getAdresseSiegeSocial(): string
    {
        return $this->adresseSiegeSocial;
    }

    /**
     * @param string $adresseSiegeSocial
     * @throws Exception
     */
    public function setAdresseSiegeSociale(string $adresseSiegeSocial): void
    {
        if ($this->isValidAddress($adresseSiegeSocial)) {
            $this->adresseSiegeSocial = $adresseSiegeSocial;
        } else {
            throw new Exception("Adresse siege social not valid", 1);
        }
    }
}
