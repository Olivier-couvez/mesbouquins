<?php
session_start();
//créer une variable de session
$_SESSION['pseudo'] = $_GET["nom"];

if (isset($_SESSION['pseudo']) == TRUE) {
    echo $_SESSION['pseudo'];
}