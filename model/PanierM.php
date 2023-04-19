<?php 
class Panier {
    private $productName;
    private $quantite;
    private $price;
    private $pd_img;
    private $prixtot;
    private $idClient;
  

    function __construct($productName,$quantite,$price,$pd_img,$prixtot,$idClient){
        $this->productName=$productName;
        $this->quantite=$quantite;
        $this->price=$price;
        $this->pd_img=$pd_img;
        $this->prixtot=$prixtot;
        $this->idClient=$idClient;
        

    }

    //GE0T000000000000TERS
    function getproductName(){
        return $this->productName;
    }
    function getquantite(){
        return $this->quantite;
    }
   
    function getprice(){
        return $this->price;
    }
    function getpd_img(){
        return $this->pd_img;
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
    function setquantite(int $quantite){
        $this->quantite=$quantite;
    }
   
   function setprice(float $price){
       $this->price=$price;
   }
    
    function setpd_img(string $pd_img){
        $this->pd_img=$pd_img;
    }
    function setprixtot(float $prixtot){
        $this->prixtot=$prixtot;
    }
    function setidClient(int $idClient){
        $this->idClient=$idClient;
    }
    
}
?>