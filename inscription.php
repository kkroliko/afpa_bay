<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
        <meta charset="UTF-8">
        <title></title>

<head>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
    <body>

		<header> 
					<?php
     					include'HUpload.php';
 					?>  
        </header>
			        <?php if (isset($_SESSION['id'])) 
			        {
			        	header("Location: Accueil.php");
			        	exit();
       		 		} 			
       				?>

			    	<main>
			    			<div class="format container">
			  					<form method="post">
					      			<div id="connec">  
					         			<h3>Inscription</h3>
					         			<input class="search-query" type="text" placeholder="Identifiant" name='pseudo'>
					          			</br>
					          			<input class="search-query" type="text" placeholder="Mot de passe" name='pass'>
					          			</br>
					         			<input class="search-query" type="email" placeholder="Adresse email" name='email'>
					         			</br>
					         			<div class="g-recaptcha" data-sitekey="6LfaAycUAAAAAFNmBW1EUXQ1mmRWJ85S8puotTwV">	
			  					</div>
					          			<button type="submit">Envoyer</button>              
			         		 		</div>
			   					</form>
							</div>
			       				<?php 
									include 'fonctionbdd.php';
									BDDAFPA::register();
								?>

					</main>
			      
