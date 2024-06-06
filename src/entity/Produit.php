<?php

class Produit {
    private $id;
    private $titre;
    private $maindoeuvre;

    public function __construct($id, $titre, $maindoeuvre) {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setMaindoeuvre($maindoeuvre);
    }

    public function getId() {return $this->id;}
    public function getTitre() {return $this->titre;}
    public function getMaindoeuvre() {return $this->maindoeuvre;}
    public function setId($value) {$this->id = $value;}
    public function setTitre($value) {$this->titre = $value;}
    public function setMaindoeuvre($value) {$this->maindoeuvre = $value;}
}
