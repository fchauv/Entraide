<?php
require 'modele/inscrire.php';

$infos=[];
$infos['pseudo'] = $_POST['pseudo'];
$infos['mail'] = $_POST['mail'];
$infos['mdp'] = $_POST['mdp'];
$infos['cmdp'] = $_POST['cmdp'];

$erreur = inscrire($infos);

include('controleur/afficherInscription.php');
?>