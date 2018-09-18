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
		if (
			(
				isset($_GET['action']) && 
				isset($_GET['id'])
			) && (
				$_GET['action'] == 'detail' &&
				$_GET['id'] != ''
			)
		) {
			$entityController->getDetail_request($_GET['id']);
		} elseif (
			(
				isset($_GET['action']) && 
				!isset($_GET['id'])
			) && $_GET['action'] == 'all'
		) {
			$entityController->getAll_request();
		}
		break;

	case 'POST':
		if (
			(
				isset($_GET['action']) && 
				!isset($_GET['id'])
			) && $_GET['action'] == 'add'
		) {
			$entityController->add_request($_POST);
		} elseif (
			(
				isset($_GET['action']) && 
				isset($_GET['id'])
			) && (
				$_GET['action'] == 'update' &&
				$_GET['id'] != ''
			)
		) {
			$entityController->update_request($_GET['id'], $_POST);
		}
		break;

	case 'DELETE':
		if (
			(
				isset($_GET['action']) && 
				isset($_GET['id'])
			) && (
				$_GET['action'] == 'delete' &&
				$_GET['id'] != ''
			)
		) {
			$entityController->delete_request($_GET['id']);
		}
		break;
}