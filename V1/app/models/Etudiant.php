<?php
class Etudiant {
    private $mysqli;

    public function __construct($db) {
        $this->mysqli = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM etudiants";
        return $this->mysqli->query($sql);
    }

    
    public function findById($id) {
      
        $query = "SELECT * FROM etudiants WHERE id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $etudiant = $result->fetch_assoc();
        
        return $etudiant;
    }

    public function add($nom, $prenom,  $email, $phone, $filiere) {
        $stmt = $this->mysqli->prepare("INSERT INTO etudiants (nom, prenom, email,phone, filiere) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $nom, $prenom, $email, $phone, $filiere);
        return $stmt->execute();
    }
    
    public function update($id, $nom, $prenom,  $email, $phone, $filiere) {
        $stmt = $this->mysqli->prepare("UPDATE etudiants SET nom=?,  prenom=?, email=?, phone=?, filiere=? WHERE id=?");
        $stmt->bind_param('sssssi', $nom, $prenom, $email, $phone, $filiere, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM etudiants WHERE id=?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
