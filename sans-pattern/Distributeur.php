<?php

class Distributeur
{

    const EPUISE = 0;
    const SANS_PIECE = 1;
    const A_UNE_PIECE_DEDANS = 2;
    const TRANSACTION_VALIDEE = 3;

    public $current_etat = self::EPUISE;
    public $nb_bonbon_restant;

    public function __construct($nb_bonbon)
    {
        $this->nb_bonbon_restant = $nb_bonbon;

        if ($this->nb_bonbon_restant > 0) {
            $this->current_etat = self::SANS_PIECE;
        }
    }

    public function insererPiece()
    {
        if ($this->current_etat == self::A_UNE_PIECE_DEDANS)
        {
            self::println("Vous ne pouvez plus insérer de pièces");
        }
        else if ($this->current_etat == self::EPUISE)
        {
            self::println("vous ne pouvez pas insérer de pièce, nous sommes en rupture de stock");
        }
        else if ($this->current_etat == self::TRANSACTION_VALIDEE)
        {
            self::println("Veuillez patienter, il y a déja une transaction en cours....");
        }
        else if ($this->current_etat == self::SANS_PIECE)
        {
            $this->current_etat = self::A_UNE_PIECE_DEDANS;
            self::println("Vous avez inséré une pièce");
        }
    }

    public function ejecterPiece() {

        if ($this->current_etat == self::A_UNE_PIECE_DEDANS) {
            $this->current_etat = self::SANS_PIECE;
            self::println("Pièce retournée");
        }
        else if ($this->current_etat == self::SANS_PIECE)
        {
            self::println("Vous n'avez pas insérez de pièce.");
        }
        else if ($this->current_etat == self::TRANSACTION_VALIDEE)
        {
            self::println("trop tard, Vous avez déja tourné la poignée");
        }
        else if ($this->current_etat == self::EPUISE)
        {
            self::println("Éjection impossible, vous n’avez pas inséré de pièce");
        }
    }

    public function tournerPoignee() {

        if ($this->current_etat == self::TRANSACTION_VALIDEE) {
            self::println("pas la peine de tourner 2 fois la poignée");
        }
        else if ($this->current_etat == self::SANS_PIECE)
        {
            self::println("Vous pouvez tourner, sans pièce ça fera rien.");
        }
        else if ($this->current_etat == self::EPUISE)
        {
            self::println("Tu ne voix pas que la machine est vide???");
        }
        else if ($this->current_etat == self::A_UNE_PIECE_DEDANS)
        {
            self::println("Vous avez tourné...");
            $this->current_etat = self::TRANSACTION_VALIDEE;
            $this->delivrerBonbon();
        }
    }


    private function delivrerBonbon() {

        if ($this->current_etat == self::TRANSACTION_VALIDEE) {

            $this->nb_bonbon_restant = $this->nb_bonbon_restant - 1;
            self::println("Un bonbon va sortir");

            if ($this->nb_bonbon_restant == 0) {
                self::println("c'était le dernier! Rupture de stock");
                $this->current_etat = self::EPUISE;
            }
            else
            {
                $this->current_etat = self::SANS_PIECE;
            }
        }
        else if ($this->current_etat == self::SANS_PIECE)
        {
            self::println("Il faut payer d’abord");
        }
        else if ($this->current_etat == self::EPUISE)
        {
            self::println("Cas impossible");
        }
        else if ($this->current_etat == self::A_UNE_PIECE_DEDANS)
        {
            self::println("Cas impossible");
        }
    }



    public function __toString()
    {

        if ($this->current_etat == self::A_UNE_PIECE_DEDANS)
        {
            return "<br/>--------<p>MACHINE DIT: J'ai une pièce (stock:".$this->nb_bonbon_restant.")<p>-----<br/>";
        }
        else if ($this->current_etat == self::EPUISE)
        {
            return"<br/>--------<p>MACHINE DIT: Mon stock est vide (stock:".$this->nb_bonbon_restant.")<p>-----<br/>";
        }
        else if ($this->current_etat == self::TRANSACTION_VALIDEE)
        {
            return "<br/>--------<p>MACHINE DIT: La transaction est validé (poigné tournée) (stock:".$this->nb_bonbon_restant.")<p>-----<br/>";
        }
        else if ($this->current_etat == self::SANS_PIECE)
        {
            return "<br/>--------<p>MACHINE DIT: Je suis dispo -  sans pièce (stock:".$this->nb_bonbon_restant.")<p>-----<br/>";
        }
    }

    public static function println($s)
    {
        echo $s."<br/>";
    }
}