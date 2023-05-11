<?php
include '../connection.php';
require_once 'C:/xampp/htdocs/projet/view/connection.php';
include '../Model/produit.php';
//!!!!!!!!!!!!!!!!!!!!!ne pas changer les includes!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

class produitc
{
    public function listproduit()
    {
        $sql = "SELECT * FROM produit1";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduit($num)
    {
        $sql = "DELETE FROM produit1 WHERE num = :num";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':num', $num);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    //:nom, :nb_reservation, :domaine, :date, :nb_place, :description, :prix_billet

    function addproduit($produit)
    {
        $sql = "INSERT INTO produit1  
        VALUES (NULL, :num,:nom_peintre,:prix, :adresse_p,  :description, :tel_p, :nationalite)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'num' => $produit->getnum(),
                'nom_peintre' => $produit->getnom_peintre(),
                'prix' => $produit->getprix(),
                'adresse_p' => $produit->getadresse_p(),
                'description' => $produit->getdescription(),
                'tel_p' => $produit->gettel_p(),
                'nationalite' => $produit->getnationalite(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateproduitt($produit, $num)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit1 SET nom_peintre=:nom_peintre, prix=:prix, adresse_p=:adresse_p, description=:description, tel_p=:tel_p,nationalite=:nationalite WHERE num=:num'
            );
            $query->execute([
                'num' => $produit->getnum(),
                'nom_peintre' => $produit->getnom_peintre(),
                'prix' => $produit->getprix(),
                'adresse_p' => $produit->getadresse_p(),
                'description' => $produit->getdescription(),
                'tel_p' => $produit->gettel_p(),
                'nationalite' => $produit->getnationalite()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showproduit($num)
    {
        $sql = "SELECT * from produit1 where num = $num";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}