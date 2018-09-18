<?php

require_once './config/config.php';
foreach ($entities as $key => $entity) {
	require_once './controllers/'.$entity.'Controller.php';
}

if(isset($_GET['entity']) && in_array($_GET['entity'], $entities)) {
	$entity = $_GET['entity'].'Controller';
	$entreprise = new $entity;
}

var_dump($entreprise->getAll());
var_dump($_SERVER);