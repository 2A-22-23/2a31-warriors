<?php
class categorie
{
    private ?int $id = null;
    private ?string $nom=null;

    public function __construct($id = null, $nom)
    {
        $this->id = $id;
       $this->nom=$nom;
    }

    /**
     * Get the value of idreservation
     */
    
		public function getid(){
			return $this->id;
		}
		public  function getnom(){
			return $this->nom;
		}
		
		public function setid(string $id){
			$this->id=$id;
		}
		public function setnom(string $nom){
			$this->nom=$nom;
		}
}
