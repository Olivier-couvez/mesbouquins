<?php ob_start();
session_start();
    $title = "Arc-en-ciel"?>
            
                <article class="art-main">
                    <h1>Recherche par auteur</h1>
                    <label for="site-search">Search the site:</label>
<input type="search" id="site-search" name="q"
       aria-label="Search through site content">

<button>Search</button>
                </article>
                <!-- <section class="content-sec">
                    <article class="art-sec">
                        <h2>Caviar de truite fondant</h2>
                        <img src="images/oeufs.jpg" alt="Des oeufs de truites en gros plan">
                        <p>
                            Nous produisons un ikura de truite à texture fondante. Ce produit est fabriqué à partir de
                            notre propre matière première...
                        </p>
                    </article>
                    <article class="art-sec">
                        <h2>Truite saumonée</h2>
                        <img src="images/truite4.jpg" alt="Un filet de truite saumonée">
                        <p>
                            Des filets de truite peuvent être produits sur commande. Le filetage aura lieu en novembre
                            et décembre, lorsque la majorité des truites fraîches seront prêtes à la récolte...
                        </p>
                    </article>
                    <article class="art-sec">
                        <h2>La qualité de l'eau</h2>
                        <img src="images/truite3.jpg" alt="Des truites à la surface de l'eau dans un bassin">
                        <p>
                            L'eau est de très bonne qualité mais sa température varie fortement
                            (0°C à 24°C), le pH est neutre et la teneur en oxygène est constante toute l'année...
                        </p>
                    </article>
                    <article class="art-sec">
                        <h2>Alimentation</h2>
                        <img src="images/alimentation.jpg" alt="Un pisciculteur avec une épuisette dans un bassin">
                        <p>
                            La nutrition a un impact considérable sur la santé, la taille et la qualité du poisson
                            d'élevage...
                        </p>
                    </article>
                </section> -->
            
            
            <?php $contenu = ob_get_clean();
            require "template/gabarit.php";
            ?>
        </div>
    </body>

</html>