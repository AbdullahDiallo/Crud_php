<?php
require_once __DIR__ . '/../../database.php';

require_once(__DIR__ . '/../../models/Cours.php');


$cours = new Cours($mysqli);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $success = $cours->delete($id);

    if ($success) {
        header('Location: /cours');
        exit();
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "ID invalide.";
}
