<?php
function envoyer($message, $conversation)
{
    require 'connexionBDD.php';

    $req = $bdd->prepare('INSERT INTO messages(id_utilisateurs, texte, id_conversation) VALUES(:auteur, :texte, :conversation)');
    $req->execute(array(
        'auteur' => $_SESSION['id'],
        'texte' => $message,
        'conversation' => $conversation
    ));
}
?>