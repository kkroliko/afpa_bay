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
  </head>   
  
    <body>

    <header> 
          <?php
              include'header.php';
          ?>  
        </header>
              <?php if (isset($_SESSION['id'])) 
              {
                header("Location: Accueil.php");
                exit();
              }       
              ?>
              
            <main>

              
                  <h3>Connection</h3>
                  <form method="post">
                        <input class="search-query" type="text" placeholder="Identifiant" name='pseudo1'>     
                        <input class="search-query" type="password" placeholder="Mot de passe" name='pass1'>
                        <button type="submit">Envoyer</button>
                  </form>


                    <?php 
                  include 'fonctionbdd.php';
                  BDDAFPA::connection();
                ?>

          </main>