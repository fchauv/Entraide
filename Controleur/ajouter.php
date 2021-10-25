<?php
require 'modele/ajout.php';
$id = $_GET['id'];
$nom = $_POST['texte'];

if(!isset($_SESSION['id']))
{
    $erreur="Vous devez être connecté pour creer une conversation";
}
else if($nom=="")
{
    $erreur="";
}
else
{
    ajouter($nom, $id);
}
include ('controleur/afficherCategorie.php');
?>
