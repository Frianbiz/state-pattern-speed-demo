<?php


class EtatTransactionValidee implements EtatInterface
{
    public $distributeur;

    public function __construct(DistributeurV2 $distributeur)
    {
       $this->distributeur = $distributeur;
    }

    public function insererPiece()
    {
        Distributeur::println("Veuillez patienter, le bonbon va tomber");
    }

    public function ejecterPiece()
    {
        Distributeur::println("Vous avez déjà tourné la poignée... trop tard!!!");
    }

    public function tournerPoignee()
    {
        Distributeur::println("Inutile de tourner deux fois !");
    }

    public function delivrerBonbon()
    {
        $this->distributeur->liberer();
        if($this->distributeur->nb_bonbon_restant > 0)
        {
            $this->distributeur->setEtat($this->distributeur->etatSansPiece);
        }
        else
        {
            Distributeur::println("y'a plus de bonbon");
            $this->distributeur->setEtat($this->distributeur->etatEpuise);
        }
    }
    public function __toString()
    {
        return "ETAT TRANSACTION VALIDÉE";
    }
}