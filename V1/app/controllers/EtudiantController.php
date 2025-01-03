<?php
require_once __DIR__ . '/../database.php';
require_once __DIR__ . '/../models/Etudiant.php';

class EtudiantController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Etudiant($db);
    }
    public function index()
    {
        $etudiants = $this->model->getAll();
        require __DIR__ . '/../views/etudiants/etudiants.php';
    }

    public function show($id)
    {
        $etudiants = $this->model->findById($id);
        require_once __DIR__ . '/../views/etudiants/show.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['filiere'])) {
                $success = $this->model->add($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['phone'], $_POST['filiere']);
                if ($success) {
                    header('Location: /etudiants');
                    exit();
                } else {
                    echo "Erreur lors de l'ajout.";
                }
            } else {
                echo "Tous les champs sont obligatoires.";
            }
        } else {
            require __DIR__ . '/../views/etudiants/create.php';
        }
    }

    public function edit($id)
    {
        $students = $this->model->findById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['filiere'])) {
                $success = $this->model->update($id, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['phone'], $_POST['filiere']);
                if ($success) {
                    header('Location: /etudiants');
                    exit();
                } else {
                    echo "Erreur lors de la modification.";
                }
            } else {
                echo "Tous les champs sont obligatoires.";
            }
        } else {
            require __DIR__ . '/../views/etudiants/edit.php';
        }
    }


    public function delete($id)
    {
        $success = $this->model->delete($id);
        if ($success) {
            header('Location: /etudiants');
            exit();
        } else {
            echo "Erreur lors de la suppression.";
        }
    }
}
