<?php
	include 'C:/xampp/htdocs/art&lux1/config.php';
	include_once 'C:\xampp/htdocs\art&lux1\model/Reclamation.php';
	class ReclamationC {
		function afficherreclamations(){
			$sql="SELECT * FROM reclamations";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
			die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerreclamation($id){
			$sql="DELETE FROM reclamations WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamations (Nom, Prenom, Email,Messagee) 
			VALUES (:Nom,:Prenom,:Email,:Messagee)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([

					'Nom' => $reclamation->getNom(),
					'Prenom' => $reclamation->getPrenom(),
					'Email' => $reclamation->getEmail(),
					'Messagee' => $reclamation->getmessagee()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreclamation($id){
			$sql="SELECT * from reclamations where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreclamation($reclamation, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamations SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						Email= :Email, 
						Messagee= :Messagee
					WHERE id= :id'
				);
				$query->execute([
					'id' => $id,
					'Nom' => $reclamation->getNom(),
					'Prenom' => $reclamation->getPrenom(),
					'Email' => $reclamation->getEmail(),
					'Messagee' => $reclamation->getMessagee(),
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	function Translate($chaine, $langFrom, $langTo)
{
	$chaine = urlencode($chaine);
	$url = 'http://translate.google.com/translate_a/t?client=p&text='.$chaine.'&hl='.$langFrom.'&sl='.$langFrom.'&tl='.$langTo.'&ie=UTF-8&oe=UTF-8&multires=1&otf=1&pc=1&trs=1&ssel=3&tsel=6&sc=1';
	$retour = explode('"',curl($url));
	return $retour[5];
}

public function email()
{
	if(isset($_GET['send']))
	{
		$db = config::getConnexion();
		if($_SERVER['REQUEST_METHOD']== "POST")
		{
			$id=$_GET['id'];
			$email=$_GET['send'];
			$content=trim($_POST['content']);
			if(!empty($email) && !empty($content))
			{
				$subject='reponse a votre reclamation';
				$headers='from: nour.chehida@esprit.tn\r\n';
				
				if(mail($email,$subject,$content,$headers))
				{
					echo"message envoyee";
					$sql="DELETE FROM reclamations WHERE id=:id";
					$req=$db->prepare($sql);
					$req->bindValue(':id', $id);
					try{
						$req->execute();
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMeesage());
					}
					header("Location:nourrr.php");
				}
				else
				{
					echo"erreur";
					header("Location:f.php");
				}
			}
		}
	}
}

	}




	/*include '../config.php';
	include_once '../Model/Reclamation.php';
	
	class ReclamationC {
		function afficherreclamations(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function supprimerreclamation($id_reclamation){
			$sql="DELETE FROM reclamation WHERE id__reclamation=:id_reclamation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_reclamation', $id_reclamation);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (id_reclamation, Nom, Prenom, Email,Messagee) 
			VALUES (:id_reclamation,:Nom,:Prenom,:Email, :Messagee)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id_reclamation' => $reclamation->getid_reclamation(),
					'Nom' => $reclamation->getNom(),
					'Prenom' => $reclamation->getPrenom(),
					'Email' => $reclamation->getEmail(),
					'Messagee' => $reclamation->getMessagee()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererreclamation($id_reclamation){
			$sql="SELECT * from reclamation where id_reclamation=$id_reclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreclamation($reclamation, $id_reclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						Adresse= :Adresse, 
						Email= :Email, 
						Messagee= :Messagee
					WHERE id_reclamation= :id_reclamation'
				);
				$query->execute([
					'Nom' => $reclamation->getNom(),
					'Prenom' => $reclamation->getPrenom(),
					'Adresse' => $reclamation->getAdresse(),
					'Email' => $reclamation->getEmail(),
					'Messagee' => $reclamation->getMessagee(),
					'NumAdherent' => $reclamation
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}*/
?>