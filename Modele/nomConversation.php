<?php
function nomConversation($conversation)
{
    require 'connexionBDD.php';

    $req = $bdd->prepare('SELECT nom FROM conversations WHERE id = ?');
    $req->execute(array($conversation));
    
    while ($donnees = $req->fetch())
    {
        $nomConversation = $donnees['nom'];
    }

    return $nomConversation;
}
?>