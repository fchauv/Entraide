<?php
function suppression($id)
{
    require 'connexionBDD.php';
    $req = $bdd->prepare('DELETE FROM messages WHERE id = ?');
    $req->execute(array($id));

    header('Location: index.php?action=afficherConversation');
}
?>
