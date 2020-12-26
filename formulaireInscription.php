<!DOCTYPE HTML>
<html>
    <head>
        <title>L'Entraide</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        
        <h2>
        <?= $erreur ?>
        </h2>

        <form id="formulaire" action="inscription.php" method="post">
        <pre>    
        <label for="mail">Entrez votre adresse email:</label> 
        <input type="email" name="mail">  
        <label for="pseudo">Choisissez un pseudo:</label> 
        <input type="text" name="pseudo">  
        <label for="mdp">Choisissez un mot de passe:</label> 
        <input type="password" name="mdp">  
        <label for="cmdp">Confirmez votre mot de passe:</label> 
        <input type="password" name="cmdp">  
        <p><button id="bouton" type="submit">Inscription</button></p>
        </pre>
        </form>
    </body>
</html>