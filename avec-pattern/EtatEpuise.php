<?php


class EtatEpuise implements EtatInterface
{
    public $distributeur;

    public function __construct(DistributeurV2 $distributeur)
    {
       $this->distributeur = $distributeur;
    }

    public function insererPiece()
    {
        Distributeur::println("Impossible y'a pas bonbon");
    }

    public function ejecterPiece()
    {
        Distributeur::println("Tu veux m'arnaquer? pas de bonbon");
    }

    public function tournerPoignee()
    {
        Distributeur::println("Tu ne voix pas qu'il n'ya pas de bonbon serieux?");
    }

    public function delivrerBonbon()
    {
        Distributeur::println("impossible pas de bonbon");
    }
    public function __toString()
    {
        return "ETAT EPUISE RUPTURE DE STOCK";
    }
}