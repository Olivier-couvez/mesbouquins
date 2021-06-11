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
        <?= $row['Id'] . "-" . $row['AddrEmplacement']; ?>
        <a href="<?= base_url("Cconteneur/detail/") . '/' . $row['Id']; ?>">Plus d'infos</a>
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