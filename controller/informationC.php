<?php 
    require_once "C:/xamppp/htdocs/art&lux/views/config.php";
    require_once "C:/xamppp/htdocs/art&lux/model/informationM.php";

    class informationC {


        function afficherinformation() {
            $sql = "SELECT * FROM information ";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();

                 $liste = $query->fetchAll();
                return $liste;
            } catch(Exception $e){
				$e->getMessage();
			}
        }
        function rechinformation($nom) {
            $sql = "SELECT * FROM information where nom_produit='$nom' ";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();

                 $liste = $query->fetchAll();
                return $liste;
            } catch(Exception $e){
				$e->getMessage();
			}
        }


        function ajouterinformation($info){
                            
             $nom_produit=$info->getnom_produit();
             $cordonnee=$info->getcordonnee();
          
            try {
                $sql = "INSERT INTO information (nom_produit,cordonnee)
                VALUES('$nom_produit','$cordonnee')";

                $db = config::getConnexion();
                    $query = $db->prepare($sql);
                    $query->execute();
                } catch(Exception $e){
                    $e->getMessage();
                }
    }
   
        
       

    function modifierEtat($nom){
            
           
       
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
            "UPDATE information SET
             
            WHERE nom_produit = '$nom'");
            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();

        }
     }
  

    function supprimerCommande($nom){
        $db = config::getConnexion();
        $sql = "DELETE FROM information where nom_produit=:nom";

        try {
            $query = $db->prepare($sql);
            $query->execute(['nom'=>$nom]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

  



    }       