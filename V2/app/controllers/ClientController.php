<?php

require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/RendezVous.php';
class ClientController {
    private $clientModel;
    private $rendezVousModel;
    public function __construct($connexion) {
        $this->clientModel = new Client($connexion);
        $this->rendezVousModel = new RendezVous($connexion);
    }

    public function index() {
        $clients = $this->clientModel->getAll();
        require_once __DIR__ . '/../views/clients/clients.php';
    }

    public function show($id) {
        $client = $this->clientModel->getById($id);
        $rendezVous = $this->rendezVousModel->getByClientId($id);
        require_once __DIR__ . '/../views/clients/show.php';
    }
    

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clientModel->save($_POST);
            header("Location: /clients");
            exit();
        }
        require_once __DIR__ . '/../views/clients/create.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->clientModel->update($id, $_POST);
            header("Location: /clients");
            exit();
        }
        $client = $this->clientModel->getById($id);
        require_once __DIR__ . '/../views/clients/edit.php';
    }

    public function delete($id) {
        $this->clientModel->delete($id);
        header("Location: /clients");
        exit();
    }
}
