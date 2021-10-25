<?php
require 'modele/signal.php';
$id = $_GET['id'];

$erreur = signal($id);

include ('controleur/afficherConversation.php');
?>