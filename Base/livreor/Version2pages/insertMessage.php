<?php
require_once("bdd/bddconfig.php");

$val1 = isset($_POST['pseudo']);
$val2 = isset($_POST['commentaire']);

if (($val1) && ($val2)) {
      $pseudo = strval(htmlspecialchars($_POST["pseudo"]));
      $message = strval(htmlspecialchars($_POST["commentaire"]));

      try {

            $objBdd = new PDO("mysql:host=$bddserver; dbname=$bddname; charset=utf8", $bddlogin, $bddpass);
            $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $PDOstmt = $objBdd->prepare("insert INTO message (pseudo, message) VALUES (:pseudo,:commentaire)");
            $PDOstmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $PDOstmt->bindParam(':commentaire', $message, PDO::PARAM_STR);
            $PDOstmt->execute();

            // récup de l'ID créé dans la base au cas de traitement.

            $lastId = $objBdd->lastInsertId();

      } catch (Exception $prmE) {
            die('Erreur : ' . $prmE->getMessage());
      }
}
?>

<?php
$serveur = $_SERVER['HTTP_HOST'];
$chemin = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$page = 'index.php';
header("Location: http://$serveur$chemin/$page");
?>