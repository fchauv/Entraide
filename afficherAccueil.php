<?php
session_start();


if(isset($_SESSION['id']))
{
    ob_start();
    echo '<a href="deconnexion.php"><img id="logoCompte" src="compte.png"></a></br>
    <a href="deconnexion.php">Déconnexion</a>';
    $compte = ob_get_clean();
}
else
{
    ob_start();
    echo '<a href="index.php?action=connexion">Connexion</a></br>
    <a href="index.php?action=inscription">Inscription</a>';
    $compte = ob_get_clean();
}
require("entete.php"); 
require("accueil.php");
?>