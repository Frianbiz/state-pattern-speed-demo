<?php

class EtatSansPiece implements EtatInterface
{
    public $distributeur;

    public function __construct(DistributeurV2 $distributeur)
    {
       $this->distributeur = $distributeur;
    }

    public function insererPiece()
    {
        Distributeur::println("Vous avez inséré une pièce");
        $this->distributeur->setEtat($this->distributeur->etatAvecUnePiece);
    }

    public function ejecterPiece()
    {
        Distributeur::println("Impossible, vous n'avez pas inséré de pièce.");
    }

    public function tournerPoignee()
    {
        Distributeur::println("Vous pouvez tourner, sans pièce ça fera rien.");
    }

    public function delivrerBonbon()
    {
        Distributeur::println("Il faut payer d’abord");
    }

    public function __toString()
    {
        return "ETAT SANS PIECE";
    }
}