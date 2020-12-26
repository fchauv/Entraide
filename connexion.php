<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=entraide;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}

$req = $bdd->prepare('SELECT id, mdp FROM utilisateurs WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $_POST['pseudo']));
$resultat = $req->fetch();

$mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);

$bonmdp = password_verify($_POST['mdp'], $resultat['mdp']);


if(!$resultat)
{
    $compte='<img id=logoCompte src="compte.png"></br><a href="index.php?action=inscription">Inscription</a>';
    $erreur="Identifiant ou mot de passe incorrect";
    include("entete.php");
    include('formulaireConnexion.php');
}
else
{
    if ($bonmdp)
    {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('Location: index.php?action=afficherAccueil');    
    }
    else
    {
        $compte='<img id=logoCompte src="compte.png"></br><a href="index.php?action=inscription">Inscription</a>';
        $erreur="Identifiant ou mot de passe incorrect";
        include('entete.php');
        include('formulaireConnexion.php');
    }
}