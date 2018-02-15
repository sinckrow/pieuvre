<?php

function ajouterCitation($id)
{
	$_SESSION['citation']= $id;	
}

function getCitation()
{
	return isset($_SESSION['citation']) ;
	
}

function enregAdmin($login)
{
	$_SESSION['admin']=$login;
}
function estconnecte()
{
	return isset($_SESSION['admin']);
}
function deconnexion()
{
	session_destroy();
}
?>
