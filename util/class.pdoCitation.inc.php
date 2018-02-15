<?php

class PdoCitation
{   		
	private static $serveur='mysql:host=localhost';
	private static $bdd='dbname=citation';   		
	private static $user='root' ;    		
	private static $mdp='' ;	
	private static $monPdo;
	private static $monPdoCitation = null;
			
	private function __construct()
	{
		PdoCitation::$monPdo = new PDO(PdoCitation::$serveur.';'.PdoCitation::$bdd, PdoCitation::$user, PdoCitation::$mdp); 
		PdoCitation::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoCitation::$monPdo = null;
	}

	public  static function getPdoCitation()
	{
		if(PdoCitation::$monPdoCitation == null)
			{
				PdoCitation::$monPdoCitation= new PdoCitation();
			}
			return PdoCitation::$monPdoCitation;  
		}

	public function getLesCitations()
	{
		$req="select * from citation";
		$res = PdoCitation::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes; 
	}

	public function getCitationDuJour()
	{
		$req="select * from citation";
		$res = PdoCitation::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return($lesLignes);
	}

	public function searchCitations($motCle,$auteur)
	{
		if($auteur=='tous auteurs'){
			
			$stmt = PdoCitation::$monPdo->prepare('SELECT * from citation where libelle like "%'.$motCle.'%"');
		}else{
			$stmt = PdoCitation::$monPdo->prepare('SELECT * from citation where libelle like "%'.$motCle.'%" AND auteur_nom="'.$auteur.'"');

		}
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}

	public function getCitation($id)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT * from citation where id="'.$id.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}


	public function getAuteur($auteur)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT nom from auteur where nom="'.$auteur.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}

	public function getAuteurs()
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT * FROM auteur ORDER BY nom ASC');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}



	public function ajouterAuteur($auteur)
	{
		$stmt = PdoCitation::$monPdo->prepare('INSERT into auteur values("'.$auteur.'")');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}

	public function ajouterCitation($auteur,$ouvrage,$citation)
	{
		$stmt = PdoCitation::$monPdo->prepare('INSERT into citation (libelle,auteur_nom,ouvrage) values ("'.$citation.'","'.$auteur.'","'.$ouvrage.'")');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}

	public function validerAdmin($user, $mdp)
	{
		if(md5($user.$mdp)=="4124bc0a9335c27f086f24ba207a4912"){
			return 1;
		}else{
			return 0;
		}
		
	}

	public function modifierCitation($id,$libelle,$auteur,$ouvrage)
	{
		$stmt = PdoCitation::$monPdo->prepare('UPDATE citation 
			SET auteur_nom = "'.$auteur.'" , ouvrage="'.$ouvrage.'", libelle="'.$libelle.'"
			WHERE id = "'.$id.'"');
		$stmt->execute();

		$row=$stmt->fetch(PDO::FETCH_ASSOC);

		return $row;
	}
	public function suprCitation($idCit)
	{
		$sql= "DELETE FROM citation WHERE id = ".$idCit;
		$res= PdoCitation::$monPdo->exec($sql);
		return $res;
	}
}

?>