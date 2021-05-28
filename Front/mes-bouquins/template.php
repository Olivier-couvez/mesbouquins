<?php
session_start(); // ou dans les pages de contenu

if (isset($_SESSION['logged_in']['login']) == TRUE) {
    //l'internaute est authentifié
    echo $_SESSION['logged_in']['prenom'].' '.$_SESSION['logged_in']['nom'];
    //affichage "Se déconnecter"(logout.php), "Prif", "Paramètres", etc ...
} else { 
    //Personne n'est authentifié 
    // affichage d'un lien pour se connecter
    //<a  href="login.php">Connexion</a>
}
?>