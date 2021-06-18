<article class="main-article">
    <h1>
    <?= $page_titre1; ?>
    </h1>

    <?php 
    if (count($result) != 0 ){  ?>
    <ul class="list-items">
    <?php
    foreach ($result as $row){ ?>
   <li>
        <div class="container-liste-recherche">
        <div class="container-image">
        </div>
        <div class="container-infos-livre">
        <?='/ Titre du livre :' .$row['Livre_Titre_Original']
         .'/ Nombre de pages :' .$row['Livre_Pages']
         .'/ Appréciations :' .$row['Livre_Appreciation']; ?>
        </div>
        <div class="container-notations">
        </div>        
        <a href="<?= base_url("Crecherche/detail/") . '/' . $row['Id_Livre']; ?>">Plus d'infos</a>
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