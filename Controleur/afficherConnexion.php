<?php
$compte='<img id=logoCompte src="vue/compte.png"></br><a href="index.php?action=inscription">Inscription</a>';
if(!isset($erreur)){
    $erreur="";
}
include("vue/entete.php");
include("vue/formulaireConnexion.php");
?>