<?php
session_start();
?>
<div class="container">   
            <h1 class="col-xs-12 col-sm-12 col-md-4 col-lg-4">AFPA BAY</h1>
            <img src="photo/pirate.jpg" id="logo" name="logo" class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <?php 

            if (isset($_SESSION['pseudo']))

            {
                echo 'Vous êtes connecté ' . $_SESSION['pseudo'];
            } 
            else

            {
                echo 'Vous n\'êtes pas connecté';
            }

      ?>
</div>   
        <nav class="navbar">
                <div class="navbar-inner">
                  <div class="container">
                    <ul class="nav">                     
                      <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="Accueil.php#">Accueil</a> </li>
                      <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="Upload.php#">Upload</a> </li>
                      <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="connection.php#">Connection</a> </li> 
                      <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="inscription.php#">Inscription</a> </li>
                    </ul>
                  </div>
                </div>
        </nav>

