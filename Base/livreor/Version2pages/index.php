<?php $contenu = ob_start();
$title = "Le Livre d'Or";
require_once("bdd/bddconfig.php");

try {

    $objBdd = new PDO("mysql:host=$bddserver; dbname=$bddname; charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $prmE) {
    die('Erreur : ' . $prmE->getMessage());
}
$temps = $objBdd->query("select * from tbl_Livre");

?>

<article class="art-main">
    <h1>Le Livre d'Or</h1>
    <table id="tableau">
        <thead>
            <tr>
                <th colspan="2">Les messages</th>
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
                </tr>
            <?php
            } // fin du foreach

            $temps->closeCursor(); // Libération de la ressource de la bdd
            ?>
        </tbody>
    </table>


    <form method="POST" action="insertMessage.php">
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