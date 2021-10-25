<?php
function compte()
{
    if(isset($_SESSION['id']))
    {
        if($_SESSION['grade']==1)
        {
            ob_start();
            echo '<a href="index.php?action=deconnexion"><img id="logoCompte" src="vue/compte.png"></a></br>
            <a href="index.php?action=deconnexion">Déconnexion</a>';
            $compte = ob_get_clean();
        }
        else
        {
            ob_start();
            echo '<a href="index.php?action=admin"><img id="logoCompte" src="vue/compte.png"></a></br>
            <a href="index.php?action=deconnexion">Déconnexion</a>';
            $compte = ob_get_clean();
        }
    }
    else
    {
        ob_start();
        echo '</br><a href="index.php?action=connexion">Connexion</a></br>
        <a href="index.php?action=inscription">Inscription</a>';
        $compte = ob_get_clean();
    }
    return $compte;
}
?>