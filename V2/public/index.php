<?php

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/controllers/ClientController.php';
require_once __DIR__ . '/../app/controllers/RendezVousController.php';

$connexion = Database::getConnection();

$clientsController = new ClientController($connexion);
$rendezvousController = new RendezVousController($connexion);


$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($scriptName, '', $requestUri);
$route = trim($route, '/');


switch ($route) {
    case '':
        require_once __DIR__ . '/../app/views/home.php';
        break;

    case 'clients':
        $clientsController->index();
        break;


    case (preg_match('/^clients\/show\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $clientsController->show($id);
        break;

    case 'clients/create':
        $clientsController->create();
        break;

    case (preg_match('/^clients\/edit\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $clientsController->edit($id);
        break;

    case (preg_match('/^clients\/delete\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $clientsController->delete($id);
        break;

    case 'rendezvous':
        $rendezvousController->index();
        break;

    case 'rendezvous/create':
        $rendezvousController->create();
        break;

    case (preg_match('/^rendezvous\/edit\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $rendezvousController->edit($id);
        break;

    case (preg_match('/^rendezvous\/delete\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $rendezvousController->delete($id);
        break;

    default:
        require_once __DIR__ . '/../app/views/errors/404.php';
        break;
}
