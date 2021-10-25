<?php
function messages($conversation)
{
    require 'connexionBDD.php';

    $req = $bdd->prepare('SELECT messages.id, texte, poceblo, messages.id_utilisateurs, utilisateurs.pseudo FROM messages INNER JOIN utilisateurs ON messages.id_utilisateurs = utilisateurs.id WHERE id_conversation = :conv ORDER BY messages.id');
    $req->execute(array(
        'conv' => $conversation));

    ob_start();
    echo '<div id="messages">';
    while ($donnees = $req->fetch())
    {
        if($donnees['id_utilisateurs']==$_SESSION['id'])
        {    
            echo '<div class="user"><div class="et"><div class="auteur">&emsp;' . $donnees['pseudo'] . ':</div>
            <div class="poceblos"><a href="index.php?action=supprimer&id='.$donnees['id'].'"><img id="logoSupprimer" src="vue/supprimer.png"></a> ' . $donnees['poceblo'] . '&ensp;</div></div>
            <div class="texte">&ensp;' . $donnees['texte'] . '</div></div></br>';
        }
        else
        {
            if ($_SESSION['grade']==1)
            {
                echo '<div class="membre"><div class="et"><div class="auteur">&emsp;' . $donnees['pseudo'] . ':</div>
                <div class="poceblos"><a id="signaler" href="index.php?action=signaler&id='.$donnees['id'].'">Signaler </a> <a href="index.php?action=liker&id='.$donnees['id'].'"> <img id="logoAimer" src="vue/pouce.png"></a> ' . $donnees['poceblo'] . '&ensp;</div></div>
                <div class="texte">&ensp;' . $donnees['texte'] . '</div></div></br>';
            }
            else
            {
                echo '<div class="membre"><div class="et"><div class="auteur">&emsp;' . $donnees['pseudo'] . ':</div>
                <div class="pouces"><div><a href="index.php?action=supprimer&id='.$donnees['id'].'"><img id="logoSupprimer" src="vue/supprimerMembre.png"></a> <a href="index.php?action=liker&id='.$donnees['id'].'"><img id="logoAimer" src="vue/pouce.png"></a> ' . $donnees['poceblo'] . '&ensp;</div></div></div>
                <div class="texte">&ensp;' . $donnees['texte'] . '</div></div></br>';
            }
        }
    }
    echo '</div><form id="ecrire" action="index.php?action=message&id='.$conversation.'" method="post">
    Nouveau message:<input type="textarea" name="texte"><button type="submit">Envoyer</button></form> ';
    $req->closeCursor();

    $messages = ob_get_clean();

    return $messages;
}
?>