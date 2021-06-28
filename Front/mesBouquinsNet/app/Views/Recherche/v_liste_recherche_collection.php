<article class="main-article">

    <h1>Liste des Collections disponibles : </h1>

    <?php echo $pager->links(); ?>

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
            Titre : 
       <b><?=$row['Collection_Nom']; ?></b>
        </div>
        <div class="container-notations">
        </div>
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