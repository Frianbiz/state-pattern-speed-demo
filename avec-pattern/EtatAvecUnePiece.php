<?php


class EtatAvecUnePiece implements EtatInterface
{
    public $distributeur;

    public function __construct(DistributeurV2 $distributeur)
    {
       $this->distributeur = $distributeur;
    }

    public function insererPiece()
    {
        $this->current_etat = self::A_UNE_PIECE_DEDANS;
        Distributeur::println("Vous ne pouvez pas insérer d’autre pièce");
    }

    public function ejecterPiece()
    {
        Distributeur::println("Pièce retournée");
        $this->distributeur->setEtat($this->distributeur->etatSansPiece);
    }

    public function tournerPoignee()
    {
        Distributeur::println("Vous avez tourné...");
        $this->distributeur->setEtat($this->distributeur->etatTransactionValidee);
    }

    public function delivrerBonbon()
    {
        Distributeur::println("incoherent");
    }

    public function __toString()
    {
        return "ETAT AVEC UNE PIECE";
    }
}