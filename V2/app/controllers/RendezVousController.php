<?php

require_once __DIR__ . '/../models/RendezVous.php';
require_once __DIR__ . '/../models/Client.php';

class RendezVousController {
    private $connexion;
    private $rendezVousModel;
    private $clientModel;

    public function __construct($connexion) {
        $this->connexion = $connexion;
        $this->rendezVousModel = new RendezVous($connexion);
        $this->clientModel = new Client($connexion);
    }

    // Afficher tous les rendez-vous
    public function index() {
        $rendezVous = $this->rendezVousModel->getAll();
        
        require_once __DIR__ . '/../views/rendezvous/show.php';
    }

    // Créer un rendez-vous
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'];
            $heure = $_POST['heure'];
            $description = $_POST['description'];
            $client_id = $_POST['client_id'];

            // Validation
            $currentDate = date('Y-m-d');
            if ($date < $currentDate) {
                $error = "La date doit être supérieure ou égale à aujourd'hui.";
            } elseif (!$this->rendezVousModel->isAvailable($date, $heure, $client_id)) {
                $error = "Le client a déjà un rendez-vous à ce créneau.";
            } else {
                $this->rendezVousModel->create($date, $heure, $description, $client_id);
                header('Location: /rendezvous');
                exit();
            }
        }

        $clients = $this->clientModel->getAll();
        require_once __DIR__ . '/../views/rendezvous/create.php';
    }

    // Modifier un rendez-vous
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['date'];
            $heure = $_POST['heure'];
            $description = $_POST['description'];
            $client_id = $_POST['client_id'];

            if (!$this->rendezVousModel->isAvailable($date, $heure, $client_id, $id)) {
                $error = "Le client a déjà un rendez-vous à ce créneau.";
            } else {
                $this->rendezVousModel->update($id, $date, $heure, $description, $client_id);
                header('Location: /rendezvous');
                exit();
            }
        }

        $rendezVous = $this->rendezVousModel->getById($id);
        $clients = $this->clientModel->getAll();
        require_once __DIR__ . '/../views/rendezvous/edit.php';
    }

    // Supprimer un rendez-vous
    public function delete($id) {
        $this->rendezVousModel->delete($id);
        header('Location: /rendezvous');
        exit();
    }
}
?>
