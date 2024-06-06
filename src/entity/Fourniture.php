<?php

class Fourniture {
    private $id;
    private $titre;
    private $prix;

    public function __construct($id, $titre, $prix) {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setPrix($prix);
    }

    public function getId() {return $this->id;}
    public function getTitre() {return $this->titre;}
    public function getPrix() {return $this->prix;}
    public function setId($value) {$this->id = $value;}
    public function setTitre($value) {$this->titre = $value;}
    public function setPrix($value) {$this->prix = $value;}
}
