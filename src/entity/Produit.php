<?php

class Produit {
    private $id;
    private $titre;
    private $maindoeuvre;
    private $link;

    public function __construct($id, $titre, $maindoeuvre, $link) {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setMaindoeuvre($maindoeuvre);
        $this->setLink($link);
    }

    public function getId() {return $this->id;}
    public function getTitre() {return $this->titre;}
    public function getMaindoeuvre() {return $this->maindoeuvre;}
    public function getLink() {return $this->link;}
    public function setId($value) {$this->id = $value;}
    public function setTitre($value) {$this->titre = $value;}
    public function setMaindoeuvre($value) {$this->maindoeuvre = $value;}
    public function setLink($value) {$this->link = $value;}
}
