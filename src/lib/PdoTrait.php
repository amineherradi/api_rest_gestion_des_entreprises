<?php

namespace Api\Lib;

use PDO;

trait PdoTrait
{
    protected function getPdoInstance()
    {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    }
}
