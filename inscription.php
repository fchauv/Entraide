<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=entraide;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT mail, pseudo FROM utilisateurs');

$dispo=true;

while ($donnees = $reponse->fetch())
{
    if($donnees['mail']==$_POST['mail'])
    {
        $dispo=false;
        $compte='<img id=logoCompte src="compte.png"></br><a href="index.php?action=connexion">Connexion</a>';
        $erreur="Vous possedez déjà un compte";
        include("entete.php");
        include('formulaireInscription.php');
        break;
    }
    else if($donnees['pseudo']==$_POST['pseudo'])
    {
        $dispo=false;
        $compte='<img id=logoCompte src="compte.png"></br><a href="index.php?action=connexion">Connexion</a>';
        $erreur="Ce pseudo est déjà pris";
        include("entete.php");
        include('formulaireInscription.php');
        break;
    }
}


if($dispo==true)
{
    if($_POST['mdp']!=$_POST['cmdp'])
    {
    $compte='<img id=logoCompte src="compte.png"></br><a href="index.php?action=connexion">Connexion</a>';
    $erreur="les mots de passe ne correspondent pas";
    include("entete.php");
    include('formulaireInscription.php');
    }
    else{
    $mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT);

    $req = $bdd->prepare('INSERT INTO utilisateurs(pseudo, mail, mdp, grade) VALUES(:pseudo, :mail, :mdp, :grade)');
    $req->execute(array(
        'pseudo' => $_POST['pseudo'],
        'mail' => $_POST['mail'],
        'mdp' => $mdp,
        'grade' => 0
    ));
    header('Location: index.php?action=connexion');
    }
}
?>