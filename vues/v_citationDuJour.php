
<div id="citations"><h3><i> La citation du jour,  </i></h3></div>
<br/>
<div id="produits">
	<?php
	$id=rand(0,count($lesCitations)-1);	
	/*echo "id : ".$id ;*/
	$libelle = $lesCitations[$id]['libelle'];
	$auteur = $lesCitations[$id]['auteur_nom'];
	$ouvrage=$lesCitations[$id]['ouvrage'];
	$id = $lesCitations[$id]['id'];
	?>
	<center>

		<p><?php echo '"'.$libelle.'"' ?></p>
		<p><?php echo $auteur; if(!empty($ouvrage))?>
		<?php if(!empty($ouvrage)){echo ", tiré de : ".$ouvrage;} ?></p>
	</center>
</div>