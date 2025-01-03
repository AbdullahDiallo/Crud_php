<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AnimalController;
use App\Controllers\EquipmentController;

// Entity Manager
$entityManager = require_once __DIR__ . '/../app/config/database.php';
//config boostrap 
$blade = require_once __DIR__ . '/../app/config/bootstrap.php';

$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($scriptName, '', $requestUri);
$route = trim($route, '/');


switch ($route) {
    case '':
        require_once __DIR__ . '/../app/views/home.twig';
        break;



    case 'animal':
        $controller = new AnimalController($entityManager, $blade);
        $controller->index();
        break;



    case 'animal/create':
        $controller = new AnimalController($entityManager, $blade);
        $controller->create();
        break;



    case 'store':
        $controller = new AnimalController($entityManager, $blade);
        $controller->store($_POST);
        break;



    case (preg_match('/^animal\/edit\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new AnimalController($entityManager, $blade);
        $id = $matches[1];
        $controller->edit($id);
        break;



    case (preg_match('/^update\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new AnimalController($entityManager, $blade);
        $id = $matches[1];
        $controller->update($id, $_POST);
        break;



    case (preg_match('/^animal\/delete\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new AnimalController($entityManager, $blade);
        $id = $matches[1];
        $controller->delete($id);
        break;




    case 'equipment':
        $controller = new EquipmentController($entityManager);
        $controller->index();
        break;



    case 'equipment/create':
        $controller = new EquipmentController($entityManager);
        $controller->create();
        break;



    case 'equipment/store':
        $controller = new EquipmentController($entityManager);
        $controller->store($_POST);
        break;



    case (preg_match('/^equipment\/edit\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new EquipmentController($entityManager);
        $id = $matches[1];
        $controller->edit($id);
        break;



    case (preg_match('/^equipment\/update\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new EquipmentController($entityManager);
        $id = $matches[1];
        $controller->update($id, $_POST);
        break;



    case (preg_match('/^equipment\/delete\/(\d+)$/', $route, $matches) ? true : false):
        $controller = new EquipmentController($entityManager);
        $id = $matches[1];
        $controller->delete($id);
        break;



    default:
        require_once __DIR__ . '/../app/views/errors/404.php';
        break;
}
