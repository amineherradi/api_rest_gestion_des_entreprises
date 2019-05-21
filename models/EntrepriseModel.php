<?php

namespace Models;

use Exception;
use Lib\Validators;
use phpDocumentor\Reflection\Types\Integer;

abstract class Entreprise extends ModelsManager
{
    use Validators;

    const TABLE_NAME = "entreprise";

    /** @var int $entrepriseId */
    protected $entrepriseId;
    /** @var string $siret */
    protected $siret;
    /** @var string $denomination */
    protected $denomination;
    /** @var float $chiffreAffaire */
    protected $chiffreAffaire;
    /** @var string $type */
    protected $type;
    /** @var float $taux */
    protected $taux;

    /** @return int */
    public function getEntrepriseId(): int
    {
        return $this->entrepriseId;
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function setEntrepriseId($id): void
    {
        if ($this->isValidId($id)){
            $this->entrepriseId = $id;
        } else {
            throw new Exception("Entreprise Id not valid", 1);
        }
    }

    /** @return string */
    public function getSiret(): string
    {
        return $this->siret;
    }

    /**
     * @param $siret
     * @throws Exception
     */
    public function setSiret($siret): void
    {
        if ($this->isValidSiret($siret)) {
            $this->siret = $siret;
        } else {
            throw new Exception("Siret not valid", 1);
        }
    }

    /** @return string */
    public function getDenomination(): string
    {
        return $this->denomination;
    }

    /**
     * @param $denomination
     * @throws Exception
     */
    public function setDenomination($denomination): void
    {
        if ($this->isValidDenomination($denomination)) {
            $this->denomination = $denomination;
        } else {
            throw new Exception("Denomination not valid", 1);
        }
    }

    /** @return float */
    public function getChiffreAffaire(): float
    {
        return $this->chiffreAffaire;
    }

    /**
     * @param $chiffre_affaire
     * @throws Exception
     */
    public function setChiffreAffaire($chiffre_affaire): void
    {
        if ($this->isValidChiffreAffaire($chiffre_affaire)) {
            $this->chiffreAffaire = $chiffre_affaire;
        } else {
            throw new Exception("Chiffre d'affaire not valid", 1);
        }
    }

    /** @return float */
    public function getTaux(): float
    {
        return $this->taux;
    }

    /**
     * @param float $taux
     * @return void
     */
    public function setTaux($taux): void
    {
        $this->taux = $taux;
    }

    // Mes surcharges

    /**
     * @param Integer $id
     * @return bool
     */
    public function getOne($id): bool
    {
        return ($id) ? true : false;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function getSelected(array $ids = []): array
    {
        return ($ids)? [] : [];
    }

    /** @return array */
    public function getAll(): array
    {
        return [];
    }

    /**
     * @param Integer $id
     * @return bool
     */
    public function update(Integer $id): bool
    {
        return ($id)? true : false;
    }

    /**
     * @param Integer $id
     * @return bool
     */
    public function delete(Integer $id): bool
    {
        return ($id)? true : false;
    }
}

