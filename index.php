<?php
    if(isset($_GET['action'])){
        $page = $_GET['action'];
    }elseif(count($_GET) == 0){
        $page = 'index';
    }
    switch ($page) {
        case 'accueil':
            include('afficherAccueil.php');
            break;
        case 'connexion':
            include('afficherConnexion.php');
            break;
        case 'inscription':
            include('afficherInscription.php');
            break;
        case 'afficherConversation':
            include('afficherConversation.php');
            break;
        case 'message':
            include('message.php');
            break;
        default:
            include('afficherAccueil.php');
            break;
    }
?>