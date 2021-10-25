<?php

require 'modele/afficherSalons.php';
require 'modele/nomCategorie.php';
require 'modele/compte.php';


$compte = compte();
$id = $_GET['id'];
$nomConversation = nomCategorie($id);
$messages = Salons($id);

if(!isset($erreur))
{
    $erreur="";
}

require("vue/entete.php"); 
require("vue/conversation.php");
?>