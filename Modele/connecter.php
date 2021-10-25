<?php
function connecter($infos)
{
    require 'connexionBDD.php';

    $mdp=password_hash($infos['mdp'], PASSWORD_DEFAULT);
    
    $req = $bdd->prepare('SELECT id, mdp, grade FROM utilisateurs WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $infos['pseudo']));
    $resultat = $req->fetch();

    if(!$resultat OR !password_verify($infos['mdp'], $resultat['mdp']))
    {
        $erreur="Identifiant ou mot de passe incorrect";
    }
    else
    {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $infos['pseudo'];
        $_SESSION['grade'] = $resultat['grade'];
        header('Location: index.php?action=afficherAccueil');    
    }
    return $erreur;
}