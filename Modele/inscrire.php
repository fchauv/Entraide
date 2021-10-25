<?php
function inscrire($infos)
{
    require 'connexionBDD.php';
    $dispo=true;

    $reponse = $bdd->query('SELECT mail, pseudo FROM utilisateurs');

    while ($donnees = $reponse->fetch())
    {
        if($donnees['mail']==$infos['mail'])
        {
            $dispo=false;
            $erreur="Vous possedez déjà un compte";
        }
        else if($donnees['pseudo']==$infos['pseudo'])
        {
            $dispo=false;
            $erreur="Ce pseudo est déjà pris";
        }
    }

    if($dispo==true)
    {
        if($infos['mdp']!=$infos['cmdp'])
        {
            $erreur="les mots de passe ne correspondent pas";
        }
        else{
            $mdp=password_hash($infos['mdp'], PASSWORD_DEFAULT);

            $req = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, grade) VALUES(:pseudo, :mail, :mdp, :grade)');
            $req->execute(array(
                'pseudo' => $infos['pseudo'],
                'mail' => $infos['mail'],
                'mdp' => $mdp,
                'grade' => 0
            ));
            header('Location: index.php?action=connexion');
        }
    }
    return $erreur;

}
?>