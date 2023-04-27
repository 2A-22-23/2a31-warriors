<?php 
class information {
    private $nom_produit;
    private $cordonnee;

  

    function __construct($nom_produit,$cordonnee){
        $this->nom_produit=$nom_produit;
        $this->cordonnee=$cordonnee;


    }

    //GE0T000000000000TERS
    function getproductName(){
        return $this->nom_produit;
    }
    function getdateCmd(){
        return $this->cordonnee;
    }
   
    
    

  

    //SETTERS
    function setnom_produit(string $nom_produit){
        $this->nom_produit=$nom_produit;
    }
    function setcordonnee(int $cordonnee){
        $this->cordonnee=$cordonnee;
    }
   
 

    
}
?>