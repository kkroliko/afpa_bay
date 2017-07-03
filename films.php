<?php
if (isset($_SESSION['id']))
{
          include 'fonctionbdd.php';
          BDDAFPA::affiche_list();

}         
else 
{
          header("Location: connection.php");
}


?>