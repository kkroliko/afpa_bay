<?php
session_start();
?>

<div class="container">   
            <h1 class="col-xs-12 col-sm-12 col-md-4 col-lg-4">AFPA BAY</h1> 
            
       
        <?php 
            			if (isset($_SESSION['pseudo']))

              				{
                        echo '<input id = "logout" class="col-xs-4 col-sm-4 col-md-4 col-lg-4" type="button"  value="logout" OnClick=window.location.href="logout.php#"> ';
                  			echo 'Vous êtes connecté ' . $_SESSION['pseudo'];
              				} 
            			else
            					{
                				echo 'Vous n\'êtes pas connecté';
            					}
	      ?>
            <img src="photo/pirate.jpg" id="logo" name="logo" class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
</div>   
            <nav class="navbar">
                <div class="navbar-inner">
                  <div class="container">
                    <ul class="nav">                     
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="Accueil.php#">Accueil</a> </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="Upload.php#">Upload</a> </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3">  <a href="connection.php#">Connection</a> </li>
                        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3"> <a href="inscription.php#">Inscription</a> </li>
                     	 	</br>
                     	 	</br>
                    </ul>
                  </div>
                </div>
            </nav>

