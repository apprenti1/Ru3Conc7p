<?php

class User {
    private $id;
    private $email;
    private $mdp;

    public function __construct($id, $email, $mdp) {
        $this->setId($id);
        $this->setEmail($email);
        $this->setMdp($mdp);
    }

    public function getId() {return $this->id;}
    public function getEmail() {return $this->email;}
    public function getMdp() {return $this->mdp;}
    public function setId($value) {$this->id = $value;}
    public function setEmail($value) {$this->email = $value;}
    public function setMdp($value) {$this->mdp = $value;}
}
