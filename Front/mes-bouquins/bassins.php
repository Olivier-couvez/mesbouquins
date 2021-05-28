<?php ob_start();
session_start();
$title = "Les bassins";

require_once "bdd/bddconfig.php";
try {
    $objBdd = new PDO("mysql:host=$bddserver; dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    //$objBdd = new PDO("mysql:host=localhost;dbname=bddtruites;charset=utf8", "bts", "snir");

    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $listeBassins = $objBdd->query("select idBassin, nom, description, photo from bassin");

    
   
} catch (Exception $prmE) {

    die('Erreur : ' . $prmE->getMessage());
    //die('Erreur de connexion à la base');
}
?>

    <article class="art-main">
        <h1>Les bassins de la pisciculture du Web</h1>
        <h2>– dans un écrin de verdure</h2>
        <p>Nos truites danoises éclosent dans nos écloseries continentales, où elles passent les premiers
            mois de leur vie. L’environnement contrôlé de ces élevages nous permet d’assurer les meilleures
            conditions possibles pour leur culture. Quand elles ont environ deux ans, la plupart des truites
            sont transportées à nos élevages marins, dans les eaux côtières propres et limpides du Danemark.
        </p>

        <p>Elles y passent 7 à 8 mois, jusqu'à ce qu'elles remplissent parfaitement les conditions pour la
            récolte. Elles sont transportées vivantes et avec le plus grand soin dans de grands bateaux à
            viviers jusqu’à notre propre site de traitement situé à Aarøsund, dans le Jutland-du-Sud.</p>
    </article>

    <section class="content-sec">

        <?php
        foreach ($listeBassins as $bassin) {

        //while ($bassin = $listeBassins->fetch()) {
        ?>
        
            <article class="art-sec">
            <h2><?php echo $bassin['nom']; ?></h2>
                <img src="images/<?php echo $bassin['photo']; ?>" alt="<?php echo $bassin['nom']; ?>">
                <p><?php echo $bassin['description']; ?></p>
                <a href="temperatures.php?idbassin=<?php echo $bassin['idBassin']; ?>&nombassin=<?php echo $bassin['nom']; ?>">Voir les températures</a>
            </article>

        <?php
        } //fin du while/ foreach
        $listeBassins->closeCursor(); //libère les ressources de la bdd
        ?>
      
    
    </section>

<?php
// déconnexion à ma base
$objBdd = null;

$contenu = ob_get_clean();
require "template/gabarit.php";
?>
</div>
</body>

</html>