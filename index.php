<?php
session_start();
require_once("util/fonctions.inc.php");
require_once("util/class.pdoCitation.inc.php");
include("vues/v_entete.php") ;
/*include("vues/v_bandeau.php") ;*/

if(!isset($_REQUEST['uc']))
	$uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = pdoCitation::getpdoCitation();	 
echo "</ul>";
switch($uc)
{
	case 'accueil':
	{$auteurs= $pdo->getAuteurs();
		$lesCitations= $pdo->getCitationDuJour();
		include("vues/v_accueil.php");
		include("vues/v_citationDuJour.php");
		include("vues/v_RechercheCitation.php");
		break;}
		case 'chercherCitations' :
		{
			
			$auteurs= $pdo->getAuteurs();include("vues/v_accueil.php");
			$lesCitations= $pdo->getCitationDuJour();
			include("vues/v_citationDuJour.php");
			include("vues/v_RechercheCitation.php");
			
			if(!empty($_POST["motCle"]) || !empty($_POST["auteur"] )){
				$motCle=$_POST["motCle"];
				$auteur=$_POST["auteur"];
				$lesCitations = $pdo->searchCitations($motCle,$auteur);	
				// print_r($lesCitations);
				include("vues/v_trouveCitations.php");
			}
			
			break;
		}
		case 'administrer' :
		{ include("controleurs/c_gestionCitations.php");break;  }

	}
	include("vues/v_pied.php") ;
	?>

