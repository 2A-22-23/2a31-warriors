<?php
include '../config.php';
include '../Model/categorie.php';

class categoriec
{
    public function listcategorie()
    {
        $sql = "SELECT * FROM categorie1";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecategorie($id)
    {
        $sql = "DELETE FROM categorie1 WHERE id= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    //:nom, :nb_reservation, :domaine, :date, :nb_place, :description, :prix_billet

    function addcategorie($categorie)
    {
        $sql = "INSERT INTO categorie1
        VALUES (NULL, :id,:nom)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $categorie->getid(),
                'nom' => $categorie->getnom(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateproduitt($categorie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie1 SET nom=:nom WHERE id=:id'
            );
            $query->execute([
                'id' => $categorie->getid(),
                'nom' => $categorie->getnom(),
               
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showproduit($id)
    {
        $sql = "SELECT * from categorie1 where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}