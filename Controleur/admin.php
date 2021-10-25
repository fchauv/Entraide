<?php

require 'modele/signales.php';
require 'modele/compte.php';

$compte = compte();

$nomConversation = "Messages signalés";
$messages = signales();

if(!isset($erreur))
{
    $erreur="";
}

require("vue/entete.php"); 
require("vue/conversation.php");
?>