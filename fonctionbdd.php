<?php
class BDDAFPA
{

    function connectdb()

    {
  			try

  			{
			    $bdd = new PDO('mysql:host=localhost;dbname=AFPA Bay;charset=utf8', 'root', '200volt');
				$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $bdd;
  	 		}
  	 		catch (Exception $e)
			{
			    die('Erreur : ' . $e->getMessage());
			}
    }

    function getgenreid($genres)
    {
    						 $bdd2 = BDDAFPA::connectdb();
                             $getGenre = $bdd2->prepare('SELECT * FROM Genres WHERE genres = :genres');
					         $getGenre->bindValue(':genres', $genres);
					         $getGenre->execute();
					         $result = $getGenre->fetch();
					         $genre = $result['id'];
					         return $genre;




    }

  	function affiche_list()

  	{

	            $bdd= BDDAFPA::connectdb();
			    $reponse = $bdd->query('SELECT * from Film');
					if(isset($_GET['q']) AND !empty($_GET['q']))

								{
									  $q = strtolower($_GET['q']);
									  $reponse = $bdd->prepare("SELECT * FROM Film WHERE LOWER(acteurs) LIKE '%' :q '%' OR LOWER(titre) LIKE '%' :q '%' OR LOWER(date_sortie) LIKE '%' :q '%' OR LOWER(genres) LIKE '%' :q '%' OR LOWER(nationalite) LIKE '%' :q '%' OR LOWER(realisateur) LIKE '%' :q '%' OR LOWER(synopsis) LIKE '%' :q '%'");
									  $reponse->bindParam(':q', $q);
									  $reponse->execute();
								}
								
			   		while ($donnees = $reponse->fetch())

					    	{
					?>
								<article class="article container">
								    <div class="format container">

								        <a href="<?php echo $donnees['trailer'];?>" target="_blank"><img src="<?php echo $donnees['image'];?>" class="image col-xs-12 col-sm-12 col-md-3 col-lg-3" ></a>
								        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
								            <div><h2> <?php echo $donnees['titre'];?></h2></div>
								            <div><h4>Réalisateur : <?php echo $donnees['realisateur'];?></h4></div>
								            <div><h4>Acteurs : <?php echo $donnees['acteurs'];?></h4></div>
								            <div><h4>Nationalité : <?php echo $donnees['nationalite'];?></h4></div>
								            <div><h4>Genre : <?php echo $donnees['genres'];?></h4></div>
								            <div><h4>Année : <?php echo $donnees['date_sortie'];?></h4></div>
								            <h4><input type="checkbox" name="vu" >Vu</h4>
								        </div>
								    </div>
								    <div class="syno"><h3>Synopsis : </h3><p><?php echo $donnees['synopsis'];?></p>
								    </div>
								</article>
								<input type="button" id="le_bouton" value="Retour en haut" OnClick=window.location.href="Accueil.php#">
		    <?php   

			   		}
	
	}


    function register()

    {
   	   if (isset($_POST['pseudo']))

       {
				       	$secret = "6LfaAycUAAAAAK6x3JSD6jeuNJenAllr-yIKYCjg";
				    	$response = $_POST['g-recaptcha-response'];
				    	$remoteip = $_SERVER['REMOTE_ADDR'];
				   	 	$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 

				        . $secret

				        . "&response=" . $response

				        . "&remoteip=" . $remoteip ;

				        $aContext = array(
						    'http' => array(
						        'proxy' => 'tcp://10.127.254.1:80',
						        'request_fulluri' => true,
						    ),
						);
						$cxContext = stream_context_create($aContext);

					    $decode = json_decode(file_get_contents($api_url, false, $cxContext), true);

	        if ($decode['success'] == 1) 

	   		{									

			            $bdd= BDDAFPA::connectdb();
						$pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
						$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
						$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
						$pass_hache = sha1($_POST['pass']);

						$stmt = $bdd->prepare('INSERT INTO membres(pseudo, pass, email) VALUES (:pseudo, :pass, :email)');

						$stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
						$stmt->bindValue(':pass', $pass_hache, PDO::PARAM_STR);
						$stmt->bindValue(':email', $email, PDO::PARAM_STR);

						$stmt->execute();

						echo 'Votre compte a été crée!<a href="Accueil.php"> Retour</a>';	

			}

	    

			    else 

			    {

			        // C'est un robot ou le code de vérification est incorrecte

			    }
		       	 
		}
	}

    function connection()

    {
		if (isset($_POST['pseudo1']))

        {
 		 		$bdd= BDDAFPA::connectdb();
				$pseudo = filter_input(INPUT_POST, 'pseudo1', FILTER_SANITIZE_STRING);
				$pass = filter_input(INPUT_POST, 'pass1', FILTER_SANITIZE_STRING);
                $pass_hache = sha1($_POST['pass1']);

				$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo1 AND pass = :pass1');
				$req->bindValue(':pseudo1', $pseudo, PDO::PARAM_STR);
				$req->bindValue(':pass1', $pass_hache, PDO::PARAM_STR);

				$req->execute();
                $resultat = $req->fetch();

							if (!$resultat)

								{
							   		 echo 'Mauvais identifiant ou mot de passe !';
								}

							else

								{
								    $_SESSION['id'] = $resultat['id'];

								    $_SESSION['pseudo'] = $pseudo;

								    echo 'Vous êtes connecté ' . $_SESSION['pseudo'] . ' ! <a href="Accueil.php"> Accéder à l\'accueil.</a>'  ;
								}
		}
    }

    function upload()

    {
			    $bdd= BDDAFPA::connectdb(); 
			    $bdd2 = BDDAFPA::connectdb(); 
			    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
			    $trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);
			    $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
			    $realisateur = filter_input(INPUT_POST, 'realisateur', FILTER_SANITIZE_STRING);
			    $acteurs = filter_input(INPUT_POST, 'acteurs', FILTER_SANITIZE_STRING);
			    $nationalite = filter_input(INPUT_POST, 'nationalite', FILTER_SANITIZE_STRING);
			    $genres = filter_input(INPUT_POST, 'genres', FILTER_SANITIZE_STRING);
			    $date_sortie = filter_input(INPUT_POST, 'date_sortie', FILTER_SANITIZE_STRING);
			    $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_STRING);
					 
					    if ($titre && $realisateur && $acteurs )
					    {
					         $genre = BDDAFPA::getgenreid($genres);


					         $stmt = $bdd->prepare('INSERT INTO Film (image, trailer, titre, realisateur, acteurs, nationalite, date_sortie, genres, synopsis)
					                 				VALUES ( :image, :trailer, :titre, :realisateur, :acteurs, :nationalite, :date_sortie, :genre, :synopsis)');
					         $stmt->bindValue(':image', $image, PDO::PARAM_STR);
					         $stmt->bindValue(':trailer', $trailer, PDO::PARAM_STR);
					         $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
					         $stmt->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);
					         $stmt->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
					         $stmt->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
					         $stmt->bindValue(':date_sortie', $date_sortie, PDO::PARAM_STR);
					         $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
					         $stmt->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
					         
					         $res = $stmt->execute();

					        if ($res)

					        {
					             
					             echo 'Film ajouté à la liste <a href="Accueil.php">retour à la liste</a>';
					        }
					        else

					        {
					             echo '<p class="alert">ptit soucis ici!</p>';
					             print_r($bdd->errorInfo());
					        }
					         
					    }
					    else

					    { 
					        
					        echo '<p class="alert">*Tous les champs sont obligatoires</p>';
					        
					    }
	}		
}
?>