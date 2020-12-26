<!DOCTYPE HTML>
<html>
    <head>
        <title><?= $conversation ?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <h2><?= $conversation ?>:</h2>
        <?= $messages ?>
        <?= $erreur ?>
        <form action="index.php?action=message" method="post">
            <input type="textarea" name="texte" value="Envoyer un message">
            <button type="submit">Envoyer</button>
    </body>
</html>