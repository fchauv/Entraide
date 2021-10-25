<?php
function base($id)
{
    require 'connexionBDD.php';

    $nom = nomCategorie($id);

    $req = $bdd->prepare('SELECT id, nom FROM conversations WHERE id_theme = ? ORDER BY id DESC LIMIT 5');
    $req->execute(array($id));

    ob_start();
    echo '<div id="bloc">';
    echo '<a id="titre" href="index.php?action=afficherCategorie&id='.$id.'">'.$nom.'</a>';

    while ($donnees = $req->fetch())
    {
        echo '<a id="conv" href="index.php?action=afficherConversation&conv='.$donnees['id'].'">' . $donnees['nom'] . '</a>';
    }
    $req->closeCursor();
    echo '<a id="conv" href="index.php?action=afficherCategorie&id='.$id.'">Plus...</a></div>';

    $messages = ob_get_clean();

    return $messages;
    }