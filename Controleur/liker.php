<?php
require 'modele/like.php';
$id = $_GET['id'];

$erreur = like($id);

include ('controleur/afficherConversation.php');
?>