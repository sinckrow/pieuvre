</ul>
<?php
include('vues/v_menu.php');
if (isset($_REQUEST['action']))
	$action =$_REQUEST['action'];
else
	$action ='connexion';
switch ($action)
{	case 'connexion':
	{
		if(!estconnecte())
		{
			echo "Veuillez vous connecté :";
			include('vues/v_connexion.php');
		}
	break;
	}
	case 'validConnexion':
	{
		$user=$_REQUEST['user'];
		$mdp=$_REQUEST['mdp'];
		$n=$pdo->validerAdmin($user,$mdp);
		/*echo $n;*/
		if($n==1)
		{
			enregAdmin($user);


		}
		else
		{
			$message="Erreur d'identification";
			include('vues/v_message.php');
			include('vues/v_connexion.php');
		}
		break;	
	}
	case  'deconnexion':
	{

		deconnexion();
		include('vues/v_connexion.php');
	}
	break;


	case 'ajoutCitation':
	{
		if (!estConnecte())
		{
			include('vues/v_connexion.php');
		}
		else
		{

			/*echo "</ul>";*/

			include("vues/v_ajoutCitation.php");
			break;

		}
	}	
	break;

	case 'validerAjout':
	{
		if (!estConnecte())
			{	include ('vues/v_connexion.php');

	}
	else{
		$auteur=$_POST['auteur'];
		$citation=$_POST['citation'];
			if(!empty($auteur && $citation)){
				$ouvrage=$_POST['ouvrage'];
				$cit= $pdo->getCitation($citation);
				if(empty($cit)){
					$ok = $pdo->getAuteur($auteur);
					if(empty($ok)){
						$res= $pdo->ajouterAuteur($auteur);
						$resAjoutCit=$pdo->ajouterCitation($auteur,$ouvrage,$citation);
						$message= "citation ajouté";
						include("vues/v_message.php");
					}else{
						$resAjoutCit=$pdo->ajouterCitation($auteur,$ouvrage,$citation);
						$message= "citation ajouté";
						include("vues/v_message.php");
					}

				}else{
					$message= "il semblerait que la citation existe déjà";
					include("vues/v_message.php");
				}
			}else{
				$message= "veuillez bien saisir les champs obligatoire" ;
				include("vues/v_message.php");
			}	
				include("vues/v_ajoutCitation.php");
		}
		break;
	}

	case 'voirCitationsAdmin':
	{
		if (!estConnecte())
		{
			include('vues/v_connexion.php');
		}
		else
		{
			// $lesCitations = $pdo->getLesCitations();
			$motCle="";
			$auteur="tous auteurs";
			if(!empty($_POST["motCle"]) || !empty($_POST["auteur"] )){
			$motCle=$_POST["motCle"];
			$auteur=$_POST["auteur"];
			}
			$lesCitations = $pdo->searchCitations($motCle,$auteur);	
			include("vues/v_citationsAdmin.php");
			break;

		}
		break;
	}

	case 'modifCitation' :
	{
		if (!estconnecte())
			{	include ('vues/v_connexion.php');
	}else {

		$id=$_REQUEST['citation'];
		$laCitation = $pdo->getCitation($id);
		$auteur = $laCitation[0]['auteur_nom'];
		$ouvrage=$laCitation[0]['ouvrage'];
		$libelle=$laCitation[0]['libelle'];
		include("vues/v_modifCitation.php");

	}

	break;
	}
	case 'suprCitation' :
	{
		if (!estconnecte())
			{	include ('vues/v_connexion.php');
	}else {
		
		$id=$_REQUEST['citation'];
		$leProduit = $pdo->suprCitation($id);


		$message = "citation suprimé";
		include("vues/v_message.php");

		$lesCitations = $pdo->getLesCitations();
		include("vues/v_citationsAdmin.php");

	}

	break;
	}
	case 'chercherCitationsAdmin' :
		{
				$motCle=$_POST["motCle"];
				$auteur=$_POST["auteur"];
				$lesCitations = $pdo->searchCitations($motCle,$auteur);	
				include("vues/v_citationsAdmin.php");	
			break;
		}


	case 'confirmerModifier':
	{
		if (!estConnecte())
			{	include ('vues/v_connexion.php');

	}else{
		/*print_r($_POST);*/
		if(!empty($_POST['libelle'] && $_POST['auteur'])){
			$id = $_POST['id'];
			$libelle = $_POST['libelle'];
			$auteur = $_POST['auteur'];
			$ouvrage=$_POST['ouvrage'];	

			$res=$pdo->getAuteur($auteur);
			/*print_r($res);*/
			if(empty($res)){
				$unres=$pdo->ajouterAuteur($auteur);
			}
			$leres=$pdo->modifierCitation($id,$libelle,$auteur,$ouvrage);		
			$message="citation modifié";
			include ('vues/v_message.php');
			$lesCitations=$pdo->getLesCitations();
			include('vues/v_citationsAdmin.php');

		}else{
			echo "veullez bien saisir les champs obligatoires ";
		}
	}
	break;
	}
}
?>