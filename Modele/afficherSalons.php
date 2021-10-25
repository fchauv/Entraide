<?php
function salons($id)
{
    require 'connexionBDD.php';
    $nom = nomCategorie($id);

    $req = $bdd->prepare('SELECT id, nom FROM conversations WHERE id_theme = ? ORDER BY id DESC');
    $req->execute(array($id));

    ob_start();
    echo '<form id="ecrire" action="index.php?action=ajouter&id='.$id.'" method="post">
    Nouvelle conversation:<input type="textarea" name="texte"><button type="submit">Envoyer</button></form>
    <div id="messages">';
    while ($donnees = $req->fetch())
    {
        echo '<a id="conv" href="index.php?action=afficherConversation&conv='.$donnees['id'].'">' . $donnees['nom'] . '</a>';
    }
    echo '</div>';
    $req->closeCursor();

    $messages = ob_get_clean();

    return $messages;
}
?>