<?php
require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/Cours.php';

class CoursController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Cours($db);
    }

    public function index()
    {
        $cour = $this->model->getAll();
        require __DIR__ . '/../views/cours/cours.php';
    }

    public function show($id)
    {
        $cour = $this->model->findById($id);
        require_once __DIR__ . '/../views/cours/show.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nom_cours']) && !empty($_POST['code_cours']) && !empty($_POST['nombre_heures'])) {
                $success = $this->model->add($_POST['nom_cours'], $_POST['code_cours'], $_POST['nombre_heures']);
                if ($success) {
                    header('Location: /cours');
                    exit();
                } else {
                    echo "Erreur lors de l'ajout.";
                }
            } else {
                echo "Tous les champs sont obligatoires.";
            }
        } else {
            require __DIR__ . '/../views/cours/create.php';
        }
    }

    public function edit($id)
    {
        $cour = $this->model->findById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nom_cours']) && !empty($_POST['code_cours']) && !empty($_POST['nombre_heures'])) {
                $success = $this->model->update($id, $_POST['nom_cours'], $_POST['code_cours'], $_POST['nombre_heures']);
                if ($success) {
                    header('Location: /cours');
                    exit();
                } else {
                    echo "Erreur lors de la modification.";
                }
            } else {
                echo "Tous les champs sont obligatoires.";
            }
        } else {
            require __DIR__ . '/../views/cours/edit.php';
        }
    }

    public function delete($id)
    {
        $success = $this->model->delete($id);
        if ($success) {
            header('Location: /cours');
            exit();
        } else {
            echo "Erreur lors de la suppression.";
        }
    }
}
