<?php 
class Commande {
    private $productName;
    private $dateCmd;
    private $prixtot;
    private $idClient;
  

    function __construct($productName,$dateCmd,$prixtot,$idClient){
        $this->productName=$productName;
        $this->dateCmd=$dateCmd;
        $this->prixtot=$prixtot;
        $this->idClient=$idClient;
        

    }

    //GE0T000000000000TERS
    function getproductName(){
        return $this->productName;
    }
    function getdateCmd(){
        return $this->dateCmd;
    }
   
    
    
    function getprixtot(){
        return $this->prixtot;
    }
    function getidClient(){
        return $this->idClient;
    }
  

    //SETTERS
    function setproductName(string $productName){
        $this->productName=$productName;
    }
    function setdateCmd(int $dateCmd){
        $this->dateCmd=$dateCmd;
    }
   
 
    function setprixtot(float $prixtot){
        $this->prixtot=$prixtot;
    }
    function setidClient(int $idClient){
        $this->idClient=$idClient;
    }
    
}
?>