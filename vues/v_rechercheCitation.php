<center><h3> Recherche </h3>

<form method="post" action="index.php?uc=chercherCitations">

<input type="text" name="motCle" placeholder="par mot clé(s)" />
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