<?php

namespace Api\Models;

class AutoEntreprise extends Entreprise
{
    const TYPE = "AE";
    const TAUX = 0.25;

    /**
     * AutoEntreprise constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->entrepriseId   = (isset($data['entreprise_id'])) ? $data['entreprise_id'] : "";
            $this->siret          = $data['siret'];
            $this->denomination   = $data['denomination'];
            $this->chiffreAffaire = $data['chiffre_affaire'];
            $this->type           = $this::TYPE;
        }
    }
}
