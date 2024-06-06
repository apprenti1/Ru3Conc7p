<?php

class LinkProduitDevis {
    private $ref_produit;
    private $ref_devis;

    public function __construct($ref_produit, $ref_devis) {
        $this->setRef_produit($ref_produit);
        $this->setRef_devis($ref_devis);
    }

    public function getRef_produit() {return $this->ref_produit;}
    public function getRef_devis() {return $this->ref_devis;}
    public function setRef_produit($value) {$this->ref_produit = $value;}
    public function setRef_devis($value) {$this->ref_devis = $value;}
}
