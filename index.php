<?php

require_once './config/config.php';
foreach ($entities as $key => $entity) {
	require_once './controllers/'.$entity.'Controller.php';
}

if(
	isset($_GET['entity']) && 
	in_array($_GET['entity'], $entities)
) {
	$entityController = $_GET['entity'].'Controller';
	$entityController = new $entityController;
}



switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		$entityController->getDetail_request($_GET['id']);
		$entityController->getAll_request();
		break;

	case 'POST':
		$entityController->add_request($_POST);
		$entityController->update_request($_GET['id'], $_POST);
		break;

	case 'DELETE':
		$entityController->delete_request($_GET['id']);
		break;
}