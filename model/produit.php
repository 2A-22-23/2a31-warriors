<?php
class produit
{
    private ?int $num = null;
    private ?string $nom_peintre = null;
    private ?int $prix = null; 
    private ?string $adresse_p = null; 
    private ?string $description = null;
    private ?int $tel_p= null; 
    private ?string $nationalite = null;
    
    public function __construct($num= null, $n, $o, $d, $l, $des, $pb)
    {
        $this->num = $num;
        $this->nom_peintre = $n;
        $this->prix= $o;
        $this->adresse_p = $d;
        $this->description = $l;
        $this->tel_p = $des;
        $this->nationalite = $pb;
    }

    
    public function getnum()
    {
        return $this->num;
    }
    public function setnum($num)
    {
        $this->num = $num;

        return $this;
    }

    public function getnom_peintre()
    {
        return $this->nom_peintre;
    }
    public function setnom_peintre($nom_peintre)
    {
        $this->nom_peintre= $nom_peintre;

        return $this;
    }

    public function getprix()
    {
        return $this->prix;
    }
    public function setprix($prix)
    {
        $this->prix= $prix;

        return $this;
    }

    public function getadresse_p()
    {
        return $this->adresse_p;
    }
    public function setadresse_p($adresse_p)
    {
        $this->adresse_p = $adresse_p;

        return $this;
    }

    public function getdescription()
    {
        return $this->description;
    }
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function gettel_p()
    {
        return $this->tel_p;
    }
    public function settel_p($tel_p)
    {
        $this->tel_p = $tel_p;

        return $this;
    }

    public function getnationalite()
    {
        return $this->nationalite;
    }
    public function setnationalite($nationalite)
    {
        $this->nationalite= $nationalite;

        return $this;
    }
}