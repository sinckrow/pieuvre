<?php

class PdoCitation
{   		
	private static $serveur='mysql:host=localhost';
	private static $bdd='dbname=pieuvre';   		
	private static $user='pieuvre' ;    		
	private static $mdp='unepieuvre12354' ;	
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

		public function getCrocheteuse($prenom)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT * from crocheteuse where prenom="'.$prenom.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}
	public function getIDCrocheteuse($prenom)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT idCrocheteuse from crocheteuse where prenom="'.$prenom.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}
	public function ajouterCrocheteuse($prenom)
	{
		$stmt = PdoCitation::$monPdo->prepare('INSERT into crocheteuse (prenom) values("'.$prenom.'")');
		echo 'INSERT into crocheteuse (prenom) values("'.$prenom.'")';
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}

	public function getImg1($img1)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT * from imagepieuvre where prenom="'.$img1.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}
	public function getIDImg1($img1)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT idImagePieuvre from imagepieuvre where prenom="'.$img1.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}
	public function ajouterImg1($img1)
	{
		$stmt = PdoCitation::$monPdo->prepare('INSERT into imagepieuvre (imageP1) values("'.$img1.'")');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}
		public function getEtab($etab)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT * from etablissement where libelleEtab="'.$etab.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}
	public function getIDEtab($etab)
	{
		$stmt = PdoCitation::$monPdo->prepare('SELECT idEtab from etablissement where prenom="'.$etab.'"');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row; 
	}
	public function ajouterEtab($etab)
	{
		$stmt = PdoCitation::$monPdo->prepare('INSERT into etablissement (libelleEtab) values("'.$etab.'")');
		$stmt->execute();
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
	}
	public function ajouterPieuvre($nomPieuvre,$idCroche,$idImg1,$idEtab)
	{
		$stmt = PdoCitation::$monPdo->prepare('INSERT into pieuvre (nomPieuvre,etablissement_idEtab,imagePieuvre_idImagePieuvre,crocheteuse_idCrocheteuse) values("'.$nomPieuvre.'","'.$idEtab.'","'.$idImg1.'","'.$idCroche.'")');
		echo 'INSERT into pieuvre (nomPieuvre,etablissement_idEtab,imagePieuvre_idImagePieuvre,crocheteuse_idCrocheteuse) values("'.$nomPieuvre.'","'.$idEtab.'","'.$idImg1.'","'.$idCroche.'")';
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

	
}

?>