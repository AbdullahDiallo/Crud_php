<?php

class Client {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function getAll() {
        $stmt = $this->connexion->prepare("SELECT * FROM clients");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->connexion->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function save($data) {
        $stmt = $this->connexion->prepare("INSERT INTO clients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nom'], $data['prenom'], $data['email'], $data['telephone']]);
    }

    public function update($id, $data) {
        $stmt = $this->connexion->prepare(
            "UPDATE clients SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?"
        );
        return $stmt->execute([$data['nom'], $data['prenom'], $data['email'], $data['telephone'], $id]);
    }

    public function delete($id) {
        $stmt = $this->connexion->prepare("DELETE FROM clients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
