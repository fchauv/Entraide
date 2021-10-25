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

        <form id="formulaire" action="index.php?action=connecter" method="post">
        <pre>    
        <label for="pseudo">Entrez votre pseudo:</label> 
        <input type="text" name="pseudo">  
        <label for="mdp">Saisissez mot de passe:</label> 
        <input type="password" name="mdp">  
        <p><button id=#bouton type="submit">Connexion</button></p>
        </pre>
        </form>
    </body>
</html>