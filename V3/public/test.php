<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\ORMSetup;

try {
    if (class_exists(ORMSetup::class)) {
        echo "Doctrine ORM est chargé avec succès.";
    } else {
        echo "Doctrine ORM n'est pas chargé.";
    }
} catch (\Throwable $e) {
    echo "Erreur : " . $e->getMessage();
}
