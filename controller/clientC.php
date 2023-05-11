<?php
include '../connection.php';
require_once 'C:/xampp/htdocs/projet - Copie/view/connection.php';
include '../Model/client.php';
//!!!!!!!!!!!!!!!!!!!!!ne pas changer les includes!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

class clientc
{
    public function list()
    {
        $sql = "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete($num)
    {
        $sql = "DELETE FROM client WHERE idClient = :idClient";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idClient', $idClient);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    //:nom, :nb_reservation, :domaine, :date, :nb_place, :description, :prix_billet

    function add($client)
    {
        $sql = "INSERT INTO client  
        VALUES (NULL, :idClient,:lastName,:firstName, :address,  :dob)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'idClient' => $client->getidClient(),
                'lastName' => $client->getlastName(),
                'firstName' => $client->getfirstName(),
                'address' => $client->getaddress(),
                'dob' => $client->getdob(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function update($client, $idClient)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET lastName=:lastName, firstName=:firstName, address=:address,dob WHERE idClient=:idClient'
            );
            $query->execute([
                'idClient' => $client->getidClient(),
                'lastName' => $client->getlastName(),
                'firstName' => $client->getfirstName(),
                'address' => $client->getaddress(),
                'dob' => $client->getdob(),
               
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function show($num)
    {
        $sql = "SELECT * from client where idClient = $idClient";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}