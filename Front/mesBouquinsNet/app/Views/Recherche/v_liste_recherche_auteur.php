<article class="main-article">

    <h1>Liste des Auteurs disponibles : </h1>

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
            <b><?=$row['Pseudo_Nom_Particule']
            .$row['Pseudo_Nom']
            .' ' .$row['Pseudo_Prenom']
            ?> </b>
            Naissance :
            <b><?=
            $row['Pseudo_Naissance']
            ?> </b>
            Décès :
            <b><?=
            // if('Pseudo_Deces' != null){
            $row['Pseudo_Deces'];
            // }
            ?>
            </div> </b>
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