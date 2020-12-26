<?php
session_start();

$_SESSION = array();
session_destroy();

setcookie('login', '');
setcookie('mdp', '');

header('Location: index.php?action=accueil');
