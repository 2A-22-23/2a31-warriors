<?php
include '../config.php';

class reservationr
{
    function recherche_reservation($search_value)
    {
        $sql="SELECT * FROM reservation where   (idres like '$search_value' or idservice like '%$search_value%' or iduser like '%$search_value%' or  dateres like '%$search_value%') ";

        //global $db;
        $db = config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function Trieid() {
        $sql="SELECT * FROM reservation order by iduser";
        $db = config::getConnexion();

        try{
            $list = $db->query($sql);
            return $list;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    public function listreservation()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delete($id)
    {
        $sql = "DELETE FROM reservation WHERE idres = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function add($reservation)
    {
        $sql = "INSERT INTO reservation VALUES (NULL,:idservice,:iduser,:dateres)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idservice' => $reservation->getidservice(),
                'iduser' => $reservation->getiduser(),
                'dateres' => $reservation->getdateres()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatereservation($reservation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                   dateres = :dateres
                    
                WHERE idres= :idres'
            );
            $query->execute([
               'idres' => $id,

                'dateres' => $reservation->getdateres()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br> ";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function showDetailsres($id){
        $sql = "SELECT * FROM reservation WHERE idres = ". $id; 
        $db  = config ::getConnexion();
        try {
         $query = $db->prepare($sql);
         $query->execute();
         $reservation= $query->fetch();
         return $reservation;
        }
    
    catch (Exception $e){
        $e->getMessage();
    }
    }
}

class servicesh { //record
  public  function recherche_services($search_value)
    {
        $sql="SELECT * FROM services where   (idservice like '$search_value' or description like '%$search_value%' or price like '%$search_value%') ";

        //global $db;
        $db = config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function Trieprix() {
        $sql="SELECT * FROM services order by price";
        $db = config::getConnexion();

        try{
            $list = $db->query($sql);
            return $list;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    public function listservices (){
        $sql = "SELECT * FROM services";
        $db  = config ::getConnexion();
        try {
         $list = $db->query($sql);
         return $list;
        }
    
    catch (Exception $e){
        $e->getMessage();
    }}
    public function showDetails($id){
        $sql = "SELECT * FROM services WHERE idservice = ". $id; 
        $db  = config ::getConnexion();
        try {
         $query = $db->prepare($sql);
         $query->execute();
         $services= $query->fetch();
         return $services;
        } catch (Exception $e){
        $e->getMessage();
        }
    }
    public function add($services){
        $sql = "INSERT INTO services VALUES (NULL, :description,:price )";
        $db = config ::getConnexion(); //moujouda fel config 
        try {
    
            $query = $db->prepare($sql);
            $query->execute([
                'description'=> $services->getdescription(),
                'price'=> $services->getprice()
            ]);
        }catch(Exception $e){
            $e->getMessage();
        }
    }
    public function delete($id) {
        $sql ="DELETE FROM services WHERE idservice = :id";
        $db = config ::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue('id',$id);
            $query->execute();
        }
            catch(Exception $e){
                $e->getMessage();
            }
    }
    function updateservices($services, $id)
        {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE services SET 
                        price = :price
                        
                    WHERE idservice= :idservice'
                );
                $query->execute([
                   'idservice' => $id,

                    'price' => $services->getprice()
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br> ";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>