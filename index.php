<?php

require_once './config/config.php';
foreach ($entities as $key => $entity) {
	require_once './controllers/'.$entity.'Controller.php';
}

if(
	isset($_GET['entity']) && 
	in_array($_GET['entity'], $entities)
) {
	$entity = $_GET['entity'].'Controller';
	$entity = new $entity;
}

// $entity->getDetail_request($_GET['id']);
$entity->getAll_request();