<?php

class DistributeurV2
{
    public $etatEpuise;
    public $etatSansPiece;
    public $etatAvecUnePiece;
    public $etatTransactionValidee;

    public $current_etat;
    public $nb_bonbon_restant;

    public function __construct($nb_bonbon)
    {
        $this->etatEpuise = new EtatEpuise($this);
        $this->etatSansPiece = new EtatSansPiece($this);
        $this->etatAvecUnePiece = new EtatAvecUnePiece($this);
        $this->etatTransactionValidee = new EtatTransactionValidee($this);

        $this->nb_bonbon_restant = $nb_bonbon;

        $this->current_etat = $this->etatEpuise;
        if ($this->nb_bonbon_restant > 0) {
            $this->current_etat = $this->etatSansPiece;
        }
    }

    public function insererPiece()
    {
        $this->current_etat->insererPiece();
    }

    public function ejecterPiece()
    {
        $this->current_etat->ejecterPiece();
    }

    public function tournerPoignee()
    {
        $this->current_etat->tournerPoignee();
        $this->current_etat->delivrerBonbon();
    }

    public function setEtat(EtatInterface $etat)
    {
        $this->current_etat = $etat;
    }

    public function liberer()
    {
        Distributeur::println("un bonon va sortir");
        if($this->nb_bonbon_restant != 0)
        {
            $this->nb_bonbon_restant = $this->nb_bonbon_restant - 1;
        }
    }

    public function __toString()
    {
        return "<br/>--------<p>".$this->current_etat." (stock:".$this->nb_bonbon_restant.")<p>-----<br/>";
    }



}