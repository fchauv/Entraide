<?php
require 'modele/connecter.php';

$infos=[];
$infos['pseudo'] = $_POST['pseudo'];
$infos['mdp'] = $_POST['mdp'];

$erreur = connecter($infos);

include('controleur/afficherConnexion.php');
?>


