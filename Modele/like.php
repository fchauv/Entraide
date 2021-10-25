<?php
function like($id)
{
    require 'connexionBDD.php';
    $req = $bdd->prepare('SELECT poceblo FROM messages WHERE id = ?');
    $req->execute(array($id));

    while ($donnees = $req->fetch())
    {
        $poceblo = $donnees['poceblo'];
    }
    $req->closeCursor();

    $poceblo++;
    
    $req = $bdd->prepare('UPDATE messages SET poceblo = :poceblo WHERE id = :id');
    $req->execute(array(
        'poceblo' => $poceblo,
        'id' => $id
    ));
    $req->closeCursor;

    $erreur = "vous avez aimé ce message";

    return $erreur;
}
?>
