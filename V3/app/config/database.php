<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/../../vendor/autoload.php';


$paths = [__DIR__ . '/../models'];
$isDevMode = true;

$dbParams = [
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'gestion_ferme',
    'user'     => 'root',
    'password' => '',

];

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);

$connection = DriverManager::getConnection($dbParams, $config);


$entityManager = new EntityManager($connection, $config);

return $entityManager;
