<?php

require_once __DIR__ . '/../app/database.php';
require_once __DIR__ . '/../app/controllers/EtudiantController.php';
require_once __DIR__ . '/../app/controllers/CoursController.php';

$etudiantController = new EtudiantController($mysqli);
$coursController = new CoursController($mysqli);

// Analyse de l'URL demandée
$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($scriptName, '', $requestUri);
$route = trim($route, '/');

// Gestion des routes
switch ($route) {
    case '':
        require_once __DIR__ . '/../app/views/home.php';
        break;

    case 'etudiants':
        $etudiantController->index();
        break;

        case (preg_match('/^etudiants\/show\?id=\d+$/', $route) ? true : false):
            $id = $_GET['id'];
            $etudiantController->show($id);
            break;

    case 'etudiants/create':
        $etudiantController->create();
        break;

    case (preg_match('/^etudiants\/edit\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $etudiantController->edit($id);
        break;

    case (preg_match('/^etudiants\/delete\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $etudiantController->delete($id);
        break;

    case 'cours':
        $coursController->index();
        break;

        case (preg_match('/^cours\/show\?id=\d+$/', $route) ? true : false):
            $id = $_GET['id'];
            $coursController->show($id);
            break;

    case 'cours/create':
        $coursController->create();
        break;

    case (preg_match('/^cours\/edit\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $coursController->edit($id);
        break;

    case (preg_match('/^cours\/delete\?id=\d+$/', $route) ? true : false):
        $id = $_GET['id'];
        $coursController->delete($id);
        break;

    default:
        require_once __DIR__ . '/../app/views/errors/404.php';
        break;
}

