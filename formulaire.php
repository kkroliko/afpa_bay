<form method='post'>
                <input class="search-query" type="text" placeholder="Insérer le lien de l'image" name='image'> </br>
                <input class="search-query" type="text" placeholder="Insérer le lien du trailer" name='trailer'> </br>
                <input class="search-query" type="text" placeholder="Nom du film" name='titre'> </br>
                <input class="search-query" type="text" placeholder="Inscrire le Nom du réalisateur" name='realisateur'> </br>
                <textarea class="search-query" placeholder="Inscrire le Nom des acteurs" name='acteurs'></textarea>  </br>
                <input class="search-query" type="text" placeholder="Pays d'origine" name='nationalite'> </br>
                <select name="genres">
                    <option value="Aventure">Aventure</option>
                    <option value="Comédie">Comédie</option>
                </select>
                <input class="search-query" type="number" placeholder="Année" name='date_sortie'> </br>
                <textarea class="search-query" placeholder="Synopsis" name='synopsis'></textarea>  </br>
                <button type="submit">Envoyer</button>
</form> 
    
   
<?php

	if (isset($_SESSION['id']))

	{
		include 'fonctionbdd.php';
		BDDAFPA::upload();
	}

	else 

	{
		header("Location: connection.php");
	}


?>
