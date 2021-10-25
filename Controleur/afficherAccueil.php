<?php
require 'modele/compte.php';
require 'modele/base.php';
require 'modele/nomCategorie.php';


$compte = compte();

$info = base(1);
$ecole = base(2);
$autre = base(3);


require("vue/entete.php"); 
require("vue/accueil.php");
?>