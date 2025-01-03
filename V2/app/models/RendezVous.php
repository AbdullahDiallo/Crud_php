<?php

class RendezVous
{
    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function create($date, $heure, $description, $client_id)
    {
        $stmt = $this->connexion->prepare(
            "INSERT INTO rendezvous (date, heure, description, client_id) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$date, $heure, $description, $client_id]);
    }

    public function getAll()
    {
        $stmt = $this->connexion->query(
            "SELECT rendezvous.*, clients.nom AS client_nom, clients.prenom AS client_prenom , clients.id AS client_id
             FROM rendezvous 
             JOIN clients ON rendezvous.client_id = clients.id 
             ORDER BY rendezvous.date, rendezvous.heure"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getByClientId($client_id)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM rendezvous WHERE client_id = ?");
        $stmt->execute([$client_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id)
    {
        $stmt = $this->connexion->prepare(
            "SELECT * FROM rendezvous WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $stmt = $this->connexion->prepare("DELETE FROM rendezvous WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function update($id, $date, $heure, $description, $client_id)
    {
        $stmt = $this->connexion->prepare(
            "UPDATE rendezvous 
             SET date = ?, heure = ?, description = ?, client_id = ? 
             WHERE id = ?"
        );
        return $stmt->execute([$date, $heure, $description, $client_id, $id]);
    }

    public function isAvailable($date, $heure, $client_id, $excludeId = null)
    {
        $sql = "SELECT COUNT(*) 
                FROM rendezvous 
                WHERE date = ? AND heure = ? AND client_id = ?";
        if ($excludeId) {
            $sql .= " AND id != ?";
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$date, $heure, $client_id, $excludeId]);
        } else {
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([$date, $heure, $client_id]);
        }
        return $stmt->fetchColumn() == 0;
    }
}
