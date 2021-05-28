<?php 
session_start();

//détruire la session courante
session_destroy();

/* Redirige vers la page d'accueil */
session_start(); // ou dans les pages de contenu

if (isset($_SESSION['logged_in']['login']) == TRUE) {
    //l'internaute est authentifié
    //affichage des liens vers les pages privées
}



//Accès seulement si authentifié 
if (isset($_SESSION['logged_in']['login']) !== TRUE) {
    // Redirige vers la page d'accueil (ou login.php) si pas authentifié
    $serveur = $_SERVER['HTTP_HOST'];
    $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
    $page = 'index.php';
    header("Location: http://$serveur$chemin/$page");
}
// contenu de la page privée
?>