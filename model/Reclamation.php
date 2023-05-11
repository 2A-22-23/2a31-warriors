<?php
class Reclamation{
	private $id=null;
	private $nom=null;
	private $prenom=null;
	private $email=null;
	private $messagee=null;
	
	private $password=null;
	function __construct($id, $nom, $prenom, $email, $messagee){
		$this->id=$id;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->messagee=$messagee;
	}
	function getid(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getEmail(){
		return $this->email;
	}
	function getmessagee(){
		return $this->messagee;
	}


	
	function setNom(string $nom){
		$this->nom=$nom;
	}
	function setPrenom(string $prenom){
		$this->prenom=$prenom;
	}
	function setEmail(string $email){
		$this->email=$email;
	}
	function setMessagee(string $messagee){
		$this->messagee=$messagee;
	}
	
}

	/*class Reclamation{
		private $id_reclamation=null;
		private $nom=null;
		private $prenom=null;
		private $adresse=null;
		private $email=null;
		private $messagee=null;
		
		private $password=null;
		function __construct($id_reclamation, $nom, $prenom, $adresse, $email, $messagee){
			$this->id_reclamation=$id_reclamation;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->adresse=$adresse;
			$this->email=$email;
			$this->messagee=$messagee;
		}
		function getid_reclamation(){
			return $this->id_reclamation;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getAdresse(){
			return $this->adresse;
		}
		function getEmail(){
			return $this->email;
		}
		function getmessagee(){
			return $this->messagee;
		}


		
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setAdresse(string $adresse){
			$this->adresse=$adresse;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setMessagee(string $messagee){
			$this->messagee=$messagee;
		}
		
	}*/


?>