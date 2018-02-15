<center><h2> Recherche </h2>

	<form method="post" action="index.php?uc=administrer&action=voirCitationsAdmin">

		<input type="text" name="motCle" placeholder="par mot clé(s)" />
		<!-- <?php print_r($auteurs); ?> -->
		<select name="auteur">
			<option>tous auteurs</option>
			<?php 
			foreach($auteurs as $un){
				echo "<option value='".$un['nom']."'>".$un['nom']."</option>";
			} ?>
		</select>


		<input id="search" type="submit" value="rechercher" />

	</form>
</center>