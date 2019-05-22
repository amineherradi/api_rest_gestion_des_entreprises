<?php

namespace Api\Models;

use Api\Lib\Validators;

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
        if ($this->isValidId($id)) {
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
     * @param string $denomination
     * @throws Exception
     */
    public function setDenomination(string $denomination): void
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
     * @param float $chiffre_affaire
     * @throws Exception
     */
    public function setChiffreAffaire(float $chiffre_affaire): void
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
    public function setTaux(float $taux): void
    {
        $this->taux = $taux;
    }

    // Mes surcharges

    /**
     * @param int $id
     * @return bool
     */
    public function getOne(int $id): bool
    {
        return ($id) ? true : false;
    }

    /**
     * @param array $ids
     * @return array
     */
    public function getSelected(array $ids = []): array
    {
        return ($ids) ? [] : [];
    }

    /** @return array */
    public function getAll(): array
    {
        return [];
    }

    /**
     * @param int $id
     * @return bool
     */
    public function update(int $id): bool
    {
        return ($id) ? true : false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return ($id) ? true : false;
    }
}
