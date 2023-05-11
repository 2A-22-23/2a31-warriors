<?php
class reservation
{
    private   $idres= null;
    private   $idservice = null;
    private   $iduser = null;
    private   $dateres = null;

    public function  __construct($id=null,$n, $p, $d)
    {
        $this->idres= $id; 
        $this->idservice = $n;
        $this->iduser = $p;
        $this->dateres = $d;
    }

    /**
     * Get the value of idres
     */
    public function getidres()
    {
        return $this->idres;
    }

    /**
     * Get the value of idservice
     */
    public function getidservice()
    {
        return $this->idservice;
    }

    /**
     * Set the value of idservice
     *
     * @return  self
     */
    public function setidservice($idservice)
    {
        $this->idservice = $idservice;
        return $this;
    }

    /**
     * Get the value of iduser
     */
    public function getiduser()
    {
        return $this->iduser;
    }

    /**
     * Set the value of iduser
     *
     * @return  self
     */
    public function setiduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get the value of dateres
     */
    public function getdateres()
    {
        return $this->dateres;
    }

    /**
     * Set the value of dateres
     *
     * @return  self
     */
    public function setdateres($dateres)
    {
        $this->dateres = $dateres;

        return $this;
    }
}
