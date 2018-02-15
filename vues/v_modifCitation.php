<form method="POST" action="index.php?uc=administrer&action=confirmerModifier">
<H1> Modifier la citation </h1>
<p> Auteur <input size=48 type="text" name="auteur"  value=<?php echo '"'.$auteur.'"' ?> /></p>
<p> Ouvrage <input type="text" name="ouvrage"  value=<?php echo '"'.$ouvrage.'"' ?> /></p>
<p> Citation <textarea type="text" name="libelle"  ><?php echo $libelle ?></textarea> </p>
 <input type="hidden" name="id" value=<?php echo "$id" ?>>

<input type="submit" value="Envoyer">
</form>
