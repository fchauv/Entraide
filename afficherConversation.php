<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=entraide;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT nom FROM conversation WHERE id = ?');
$req->execute(array($_GET['id']));
$_SESSION['conversation'] = $_GET['id'];
while ($donnees = $req->fetch())
{
    $conversation=$donnees['nom'];
}
$req->closeCursor();

$req = $bdd->prepare('SELECT texte, poceblo, id_utilisateurs FROM messages WHERE id_conversation = :conv');
$req->execute(array(
    'conv' => $_GET['id']));

ob_start();

while ($donnees = $req->fetch())
{
    if($donnees['id_utilisateurs']==$_SESSION['id'])
    {    
        echo '<li class="user"><div class="auteur">' . $donnees['id_utilisateurs'] . '</div>
        <div class="texte">' . $donnees['texte'] . '</div></li>';
    }
    else
    {
        echo '<li><div class="auteur">' . $donnees['id_utilisateurs'] . '</div>
        <div class="texte">' . $donnees['texte'] . '</div></li>';
    }
}
$req->closeCursor();

$messages = ob_get_clean();


if(isset($_SESSION['id']))
{
    ob_start();
    echo '<a href="deconnexion.php"><img id="logoCompte" src="compte.png"></a></br>
    <a href="deconnexion.php">Déconnexion</a>';
    $compte = ob_get_clean();
}
else
{
    ob_start();
    echo '<a href="index.php?action=connexion">Connexion</a></br>
    <a href="index.php?action=inscription">Inscription</a>';
    $compte = ob_get_clean();
}

$erreur="";

require("entete.php"); 
require("conversation.php");
?>