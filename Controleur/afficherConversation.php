<?php

require 'modele/afficherMessages.php';
require 'modele/nomConversation.php';
require 'modele/compte.php';


$compte = compte();

if(!isset($_GET['conv'])){
    $conversation = $_SESSION['conv'];
}
else{
    $conversation = $_GET['conv'];
    $_SESSION['conv'] = $_GET['conv'];
}    
$nomConversation = nomConversation($conversation);
$messages = messages($conversation);

if(!isset($erreur))
{
    $erreur="";
}

require("vue/entete.php"); 
require("vue/conversation.php");
?>