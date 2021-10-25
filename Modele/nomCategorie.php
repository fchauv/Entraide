<?php
function nomCategorie($id)
{
    require 'connexionBDD.php';

    $req = $bdd->prepare('SELECT nom FROM theme WHERE id = ?');
    $req->execute(array($id));
    
    while ($donnees = $req->fetch())
    {
        $nomConversation = $donnees['nom'];
    }

    return $nomConversation;
}
?>
