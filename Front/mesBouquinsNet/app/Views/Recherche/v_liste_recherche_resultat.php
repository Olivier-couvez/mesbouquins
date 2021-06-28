<article class="main-article">
    <h1>Liste des Livres disponibles : </h1>

    <?php echo $pager->links(); ?>

    <?php 
    if (count($result) != 0 ){  ?>
    <ul class="list-items">
    <?php
    foreach ($result as $row){ ?>
   <li>
        <div class="container-liste-recherche">
            <div class="container-image">
                <img src="/public/css/img/img-photo-nulle.png" alt="Photo standard">
            </div>
            <div class="container-notations">
                Votes :
                <b><?=$row['Livre_Appreciation']; ?></b>
            </div>        
            <div class="container-infos-livre">
                Titre : 
                <b><?=$row['Livre_Titre_Original']; ?></b><br>
                Nombre de pages : 
                <b><?=$row['Livre_Pages']; ?></b><br>
                Date de parution :
                <b><?=$row['Livre_Parution']; ?></b>
            </div>
            <!-- <a href="<?= base_url("Crecherche/detail/") . '/' . $row['Id_Livre']; ?>">Plus d'infos</a> -->
        </div>
    </li>
    <?php } ?>
    </ul>
   <?php
    } else {
        echo "<p>Aucun résultat trouvé</p>";
    }
    ?>
    <?php echo $pager->links(); ?>
</article>