<?php
function signal($id)
{
    require 'connexionBDD.php';
    $req = $bdd->prepare('SELECT epingle FROM messages WHERE id = ?');
    $req->execute(array($id));

    while ($donnees = $req->fetch())
    {
        $epingle = $donnees['epingle'];
    }
    $req->closeCursor();

    $epingle++;
    
    $req = $bdd->prepare('UPDATE messages SET epingle = :epingle WHERE id = :id');
    $req->execute(array(
        'epingle' => $epingle,
        'id' => $id
    ));
    $req->closeCursor;

    $erreur = "vous avez signalé ce message à l'administrateur";

    return $erreur;
}
?>
