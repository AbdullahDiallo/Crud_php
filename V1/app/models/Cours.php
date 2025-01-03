<?php
class Cours {
    private $mysqli;

    public function __construct($db) {
        $this->mysqli = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM cours";
        return $this->mysqli->query($sql);
    }

    public function findById($id) {
      
        $query = "SELECT * FROM cours WHERE id = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cours = $result->fetch_assoc();
        
        return $cours;
    }
    public function add($nom_cours, $code_cours, $nombre_heures) {
        $stmt = $this->mysqli->prepare("INSERT INTO cours (nom_cours, code_cours, nombre_heures) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $nom_cours, $code_cours, $nombre_heures);
        return $stmt->execute();
    }

    public function update($id, $nom_cours, $code_cours, $nombre_heures) {
        $stmt = $this->mysqli->prepare("UPDATE cours SET nom_cours=?, code_cours=?, nombre_heures=? WHERE id=?");
        $stmt->bind_param('ssii', $nom_cours, $code_cours, $nombre_heures, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM cours WHERE id=?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
