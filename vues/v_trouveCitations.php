<div id="produits">
	<table class="table table-striped"> <tr><th> Citation</th> <th>Auteur</th><th>Ouvrage</th></tr>
<?php

foreach( $lesCitations as $uneCitation) 
{
	$libelle = $uneCitation['libelle'];
	$auteur = $uneCitation['auteur_nom'];
	$ouvrage=$uneCitation['ouvrage'];
	$id = $uneCitation['id'];
	// echo "ouvrage : ".$ouvrage;  if(!empty($ouvrage)){echo ", tiré de : ".$ouvrage;}
	?>	
	<tr>
			<td><?php echo $libelle ?></td>
			<td><?php echo $auteur;?></td>
			<td> <?php if(!empty($ouvrage)){echo $ouvrage;} ?>
			</td>
	</tr>	

<?php			
}
?></table>
</div>
