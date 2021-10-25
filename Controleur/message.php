<?php
require 'modele/nouveauMessage.php';
$conversation = $_GET['id'];
$message = $_POST['texte'];

if(!isset($_SESSION['id']))
{
    $erreur="Vous devez être connecté pour envoyer un message";
}
else if($message=="")
{
    $erreur="";
}
else
{
    envoyer($message, $conversation);
}
include ('controleur/afficherConversation.php');
?>
