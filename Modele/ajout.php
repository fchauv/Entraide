<?php
function ajouter($nom, $id)
{
    require 'connexionBDD.php';

    $reponse = $bdd->query('SELECT id, nom FROM conversations ORDER BY id');

    while ($donnees = $reponse->fetch())
    {
        $no = $donnees['id'];
        if($donnees['nom']==$nom)
        {
            $erreur="Il existe déjà une conversation de ce nom";
            return $erreur;
        }
    }

    $no++;

    $req = $bdd->prepare('INSERT INTO conversations(nom, id_theme) VALUES(:nom, :theme)');
    $req->execute(array(
        'nom' => $nom,
        'theme' => $id
    ));
    header('Location: index.php?action=afficherConversation&conv='.$no.'');
}
?>