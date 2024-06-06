<?php
require_once "../src/entity/Produit.php";
class ProduitRepository {
    private $conn;

    public function __construct() {
        $this->conn = Bdd::getBdd();
    }

    public function getAll() {
        $query = 'SELECT * FROM Produit';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $return = [];
        if (isset($result) && !empty($result)) {
            foreach ($result as $entity) {
                $return[] = new Produit($entity['id'], $entity['titre'], $entity['maindoeuvre']);
            }
        }
        return $return;
    }

    public function getById($id) {
        $query = 'SELECT * FROM Produit WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $entity = $stmt->fetch(PDO::FETCH_ASSOC);
        if (isset($entity) && !empty($entity)) {
            $return = new Produit($entity['id'], $entity['titre'], $entity['maindoeuvre']);
        }
        return $return;
    }

    public function create($entity) {
        $query = 'INSERT INTO Produit ( id, titre, maindoeuvre ) VALUES ( :id, :titre, :maindoeuvre )';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':titre', $entity->getTitre());
        $stmt->bindValue(':maindoeuvre', $entity->getMaindoeuvre());
        return $stmt->execute();
    }

    public function update($entity) {
        $query = 'UPDATE Produit SET titre = :titre, maindoeuvre = :maindoeuvre WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $entity->getId());
        $stmt->bindValue(':titre', $entity->getTitre());
        $stmt->bindValue(':maindoeuvre', $entity->getMaindoeuvre());
        return $stmt->execute();
    }

    public function delete($entity) {
        $query = 'DELETE FROM Produit WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $entity->getId());
        return $stmt->execute();
    }
}
