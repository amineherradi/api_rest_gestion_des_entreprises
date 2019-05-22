<?php

use Controllers\AutoEntrepriseController;
use Controllers\SocieteActionSimplifieController;

require_once 'autoloader.php';

/** @var string|AutoEntrepriseController|SocieteActionSimplifieController $entityController */
$entityController = "";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ((isset($_GET['action']) && isset($_GET['id'])) && ($_GET['action'] == 'detail' && $_GET['id'] != '')) {
            $entityController->getDetailRequest($_GET['id']);
        } elseif ((isset($_GET['action']) && !isset($_GET['id'])) && $_GET['action'] == 'all') {
            $entityController->getAllRequest();
        }
        break;

    case 'POST':
        if ((isset($_GET['action']) && !isset($_GET['id'])) && $_GET['action'] == 'add') {
            $entityController->addRequest($_POST);
        }
        break;

    case 'PATCH':
        $_PATCH = [];
        if ((isset($_GET['action']) && isset($_GET['id'])) && ($_GET['action'] == 'update' && $_GET['id'] != '')) {
            $patch = file_get_contents('php://input');
            $patch = urldecode($patch);
            $patch = explode("&", $patch);

            foreach ($patch as $key => $value) {
                $value = explode("=", $value);
                $_PATCH[$value[0]] = $value[1];
            }

            $entityController->updateRequest($_GET['id'], $_PATCH);
        }
        break;

    case 'DELETE':
        if ((isset($_GET['action']) && isset($_GET['id'])) && ($_GET['action'] == 'delete' && $_GET['id'] != '')) {
            $entityController->deleteRequest($_GET['id']);
        }
        break;
}
