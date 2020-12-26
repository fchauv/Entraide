<?php
session_start();

try{
    $bdd = new PDO('mysql:host=localhost;dbname=entraide;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}


if(!isset($_SESSION['id']))
{
    ob_start();
    echo '<a href="index.php?action=connexion">Connexion</a></br>
    <a href="index.php?action=inscription">Inscription</a>';
    $compte = ob_get_clean();
    $messages="";
    $conversation="";
    $erreur="Vous devez être connecté pour envoyer un message";
    include("entete.php");
    include('conversation.php');
}
else if($_POST['texte']=="")
{
    
    ob_start();
    echo '<a href="deconnexion.php"><img id="logoCompte" src="compte.png"></a></br>
    <a href="deconnexion.php">Déconnexion</a>';
    $compte = ob_get_clean();
    $erreur="";
    $messages="";
    $conversation="";
    include("entete.php");
    include('formulaireInscription.php');
    
}

else
{
    ob_start();
    echo '<a href="deconnexion.php"><img id="logoCompte" src="compte.png"></a></br>
    <a href="deconnexion.php">Déconnexion</a>';
    $compte = ob_get_clean();
    $messages=$_SESSION['conversation'];
    $conversation="";
    $erreur="";
    $req = $bdd->prepare('INSERT INTO messages(id_utilisateurs, texte, id_conversation) VALUES(:auteur, :texte, :conversation)');
    $req->execute(array(
        'auteur' => $_SESSION['id'],
        'texte' => $_POST['texte'],
        'conversation' => $_SESSION['conversation']
    ));
    require("entete.php"); 
    require("conversation.php");
}
?>
