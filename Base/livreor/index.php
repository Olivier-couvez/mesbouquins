<?php $contenu = ob_start();
$title = "Le Livre d'Or";
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


try {

    $objBddLect = new PDO("mysql:host=$bddserver; dbname=$bddname; charset=utf8", $bddlogin, $bddpass);
    $objBddLect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $prmE) {
    die('Erreur : ' . $prmE->getMessage());
}
$temps = $objBddLect->query("select * from tbl_Livre where Id_Livre between 1500 and 1600 ");

?>

<article class="art-main">
    <h1>Le Livre d'Or</h1>
    <table id="tableau">
        <thead>
            <tr>
                <th colspan="5">Les messages</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Affichage des résultats
            foreach ($temps as $temp) {
            ?>
                <tr>
                    <td>Le : <?php echo $temp['Id_Livre']; ?></td>
                    <td><?php echo $temp['Livre_Titre']; ?></td>
                    <td><?php echo $temp['Livre_Sous_Titre']; ?></td>
                    <td><?php echo $temp['Livre_ISBN']; ?></td>
                    <td><?php echo $temp['Livre_EAN']; ?></td>
                </tr>
            <?php
            } // fin du foreach

            $temps->closeCursor(); // Libération de la ressource de la bdd
            ?>
        </tbody>
    </table>


    <form method="POST" action="index.php">
        <fieldset>
            <legend>Ajouter votre commentaire au livre d'or</legend>
            Pseudo :
            <input type="text" name="pseudo" value="" placeholder="votre pseudo" required>
            Message :
            <textarea name="commentaire" rows="10" cols="40" placeholder="Votre commentaire" required></textarea>
            <input type="submit" value="Enregistrer">
        </fieldset>
    </form>

</article>



<?php $contenu = ob_get_clean();
require_once("gabarit/template.php")
?>