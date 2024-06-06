<?php

class Devis {
    private $id;

    public function __construct($id) {
        $this->setId($id);
    }

    public function getId() {return $this->id;}
    public function setId($value) {$this->id = $value;}
}
