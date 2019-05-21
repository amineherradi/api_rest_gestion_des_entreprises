<?php

use Controllers\AutoEntrepriseController;

require_once './config/config.php';
foreach ($entities as $key => $entity) {
    require_once './controllers/'.$entity.'Controller.php';
}

/** @var string|AutoEntrepriseController $entityController */
$entityController = "";

if (isset($_GET['entity']) && in_array($_GET['entity'], $entities)) {
    $entityController = $_GET['entity'].'Controller';
    $entityController = new $entityController;
}

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ((isset($_GET['action']) && isset($_GET['id'])) && ($_GET['action'] == 'detail' && $_GET['id'] != '')) {
            $entityController->getDetail_request($_GET['id']);
        } elseif ((isset($_GET['action']) && !isset($_GET['id'])) && $_GET['action'] == 'all') {
            $entityController->getAll_request();
        }
        break;

    case 'POST':
        if ((isset($_GET['action']) && !isset($_GET['id'])) && $_GET['action'] == 'add') {
            $entityController->add_request($_POST);
        }
        break;

    case 'PATCH':
        if ((isset($_GET['action']) && isset($_GET['id'])) && ($_GET['action'] == 'update' && $_GET['id'] != '')) {
            $patch = file_get_contents('php://input');
            $patch = urldecode($patch);
            $patch = explode("&", $patch);

            foreach ($patch as $key => $value) {
                $value = explode("=", $value);
                $_PATCH[$value[0]] = $value[1];
            }

            $entityController->update_request($_GET['id'], $_PATCH);
        }
        break;

    case 'DELETE':
        if ((isset($_GET['action']) && isset($_GET['id'])) && ($_GET['action'] == 'delete' && $_GET['id'] != '')) {
            $entityController->delete_request($_GET['id']);
        }
        break;
}
