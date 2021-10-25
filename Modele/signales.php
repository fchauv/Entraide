<?php
function signales()
{
    require 'connexionBDD.php';

    $reponse = $bdd->query('SELECT messages.id, texte, poceblo, epingle, messages.id_utilisateurs, utilisateurs.pseudo FROM messages INNER JOIN utilisateurs ON messages.id_utilisateurs = utilisateurs.id WHERE epingle > 0 ORDER BY epingle DESC');

    ob_start();
    echo '<div id="messages">';
    while ($donnees = $reponse->fetch())
    {
        echo '<div class="membre"><div class="et"><div class="auteur">&emsp;' . $donnees['pseudo'] . ':</div>
        <div class="pouces"><div><a href="index.php?action=supprimer&id='.$donnees['id'].'"><img id="logoSupprimer" src="vue/supprimerMembre.png"></a>' . $donnees['epingle'] . '&ensp;</div></div></div>
        <div class="texte">&ensp;' . $donnees['texte'] . '</div></div></br>';
    }

    $messages = ob_get_clean();

    return $messages;
}
?>