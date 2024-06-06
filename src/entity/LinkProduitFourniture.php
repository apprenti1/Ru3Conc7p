<?php

class LinkProduitFourniture {
    private $ref_produit;
    private $ref_fourniture;

    public function __construct($ref_produit, $ref_fourniture) {
        $this->setRef_produit($ref_produit);
        $this->setRef_fourniture($ref_fourniture);
    }

    public function getRef_produit() {return $this->ref_produit;}
    public function getRef_fourniture() {return $this->ref_fourniture;}
    public function setRef_produit($value) {$this->ref_produit = $value;}
    public function setRef_fourniture($value) {$this->ref_fourniture = $value;}
}
