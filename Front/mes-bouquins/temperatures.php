<?php ob_start();
session_start();
$title = "Les Températures";

require_once "bdd/bddconfig.php";
$idBassin = 0;
$nomBassin = "Bassin inconnu";

$idok = isset($_GET['idbassin']);
$nomok = isset($_GET['nombassin']);

if (($idok == true) && ($nomok == true)) {
    $idBassin = intval(htmlspecialchars($_GET['idbassin']));
    $nomBassin = htmlspecialchars($_GET['nombassin']);
}
try {
    $objBdd = new PDO("mysql:host=$bddserver; dbname=$bddname;charset=utf8", $bddlogin, $bddpass);

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$listeTemperatures = $objBdd->prepare("SELECT * FROM temperature  WHERE idBassin = :id ORDER BY date DESC");
$listeTemperatures->bindParam(':id', $idBassin, PDO::PARAM_INT);
$listeTemperatures->execute();
   
} catch (Exception $prmE) {

    die('Erreur : ' . $prmE->getMessage());
    //die('Erreur de connexion à la base');
}
?>
    <article class="art-main">
        <h1>Les températures de <?php echo $_GET ['nombassin'] ?></h1>
        <table class="temperature" border="1">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Température (°C)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        foreach ($listeTemperatures as $temp) { ?>
        <tr>
        <td><?php echo $temp ['date'] ?></td>
        <td><?php echo $temp ['temp'] ?></td>

                    </tbody>
        
                    
                    <?php
        } //fin du while/ foreach
        $listeTemperatures->closeCursor(); //libère les ressources de la bdd
        ?>

        </table>

    </article>


<?php
// déconnexion à ma base
$objBdd = null;

$contenu = ob_get_clean();
require "template/gabarit.php";
?>
</div>
</body>

</html>