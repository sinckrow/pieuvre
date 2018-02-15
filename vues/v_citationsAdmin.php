
	<table class="table table-striped"> <tr><th> Citation</th> <th>Auteur</th><th>Ouvrage</th><th>Modifier</th><th>Supprimer</th></tr>
<?php
$auteurs= $pdo->getAuteurs();
		include("vues/v_rechercheCitationAdmin.php");
?>
<div id="produits">
	<?php
foreach( $lesCitations as $uneCitation) 
{
	$libelle = $uneCitation['libelle'];
	$auteur = $uneCitation['auteur_nom'];
	$ouvrage=$uneCitation['ouvrage'];
	$id = $uneCitation['id'];
	?>	

	<tr>
			<td><?php echo $libelle ?></td>
			<td><?php echo $auteur;?></td><td> <?php if(!empty($ouvrage)) echo  $ouvrage; ?></td>
			<td><a href=index.php?uc=administrer&citation=<?php echo $id ?>&action=modifCitation> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			 </a></td>
			 <td><a href=index.php?uc=administrer&citation=<?php echo $id ?>&action=suprCitation> <span class="glyphicon glyphicon-remove-circle"></span>
			 </a></td>
	</tr>	

<?php			
}
?></table>
</div>
