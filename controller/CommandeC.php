<?php 
    require_once "C:/xamppp/htdocs/art&lux/views/config.php";
    require_once "C:/xamppp/htdocs/art&lux/model/CommandeM.php";

    class CommandeC {


        function afficherCommande() {
            $sql = "SELECT * FROM commande ";
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
        function rechCommande($id) {
            $sql = "SELECT * FROM commande where idCmd='$id' ";
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


        function ajouterCommande($commande){
                            
             $productName=$commande->getproductName();
             $dateCmd=$commande->getdateCmd();
             $prixtot=$commande->getprixtot();
             $idClient=$commande->getidClient();
             $etat="en cour";
            try {
                $sql = "INSERT INTO commande (nomProduit,dateCmd,prixtot,idClient,etat)
                VALUES('$productName','$dateCmd','$prixtot','$idClient','$etat')";

                $db = config::getConnexion();
                    $query = $db->prepare($sql);
                    $query->execute();
                } catch(Exception $e){
                    $e->getMessage();
                }
    }
   
        
       

    function modifierEtat($etat,$id){
            
           
       
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
            "UPDATE commande SET
             etat = '$etat' 
            WHERE idCmd = '$id'");
            $query->execute();
        } catch (PDOException $e) {
            $e->getMessage();

        }
     }
  

    function supprimerCommande($id){
        $db = config::getConnexion();
        $sql = "DELETE FROM commande where idCmd=:id";

        try {
            $query = $db->prepare($sql);
            $query->execute(['id'=>$id]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }

  



    }       