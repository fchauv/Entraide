<?php 
$compte='<img id=logoCompte src="vue/compte.png"></br><a href="index.php?action=connexion">Connexion</a>';
if(!isset($erreur)){
    $erreur="";
}
include("vue/entete.php");
include("vue/formulaireInscription.php");
?>