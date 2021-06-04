<?php ob_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Mes bouquins est un site pour les passionnés de livres, collectionneur">
        <meta name="author" content="Olivier Jaspart">
        <meta name="robots" content="none">
        <title><?=$title?></title>

        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda&display=swap" rel="stylesheet"> 
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    </head>

    <body>
    <div class="container">


        <header>
        <img src="images/logo-mes-bouquins.svg" class="logo-banner" alt="Logo de la pisciculture du web">
        <blockquote>Le meilleur caviar de truite des Hauts-de-France</blockquote>
        <select onChange="Aff();" name="Slast_name" class="Style49" id="Slast_name" onmouseout="this.size=0" style="background-color:#FFFFCC">
        <option> </option> 
        </select>
                        <div class="auth-container">
                        <?php
        // ou dans les pages de contenu

        if (isset($_SESSION['logged_in']['login']) == TRUE) {
            //l'internaute est authentifié
            $ident = $_SESSION['logged_in']['prenom'].' '.$_SESSION['logged_in']['nom'];
        ?>
        <p class='nom-prenom'><?=$ident; ?><br>
        <a href="logout.php" class="signout-link">Déconnexion</a>
        </p>
        <?php 
        } else { 
            //Personne n'est authentifié 
            // affichage d'un lien pour se connecter
        ?>  
        <a href="Inscription.php" class="signin-link">Connexion</a>
        <?php
        }
        ?>
                        </div>
                    </header>
        <nav role="navigation">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
            <a href="index.php"><li><i class="fa fa-home" aria-hidden="true"></i></li></a>
            <hr>
            <p>Recherche :</p>
            <a href="./recherche-avancee.php"><li>Avancée</li></a>
            <a href="./recherche-par-auteur.php"><li>Par auteur</li></a>
            <a href="./recherche-par-edition.php"><li>Par édition</li></a>
            <a href="./recherche-par-collection.php"><li>Par collection</li></a>
                    <hr>
            <p>Forum :</p>
            <a href="./forum/"><li>Forum</li></a>
            
            </ul>
        </div>
        </nav>



        
        <section>

                    <?php echo $contenu; ?>
        </section>
        <!-- <aside class="side">
                        <ul class="socialnetworks-links">
                            <li>
                                <a href="https://www.facebook.com"><img src="images/Facebook.svg" alt="Facebook"></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/"><img src="images/Twitter.svg" alt="Twitter"></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/"><img src="images/Instagram.svg" alt="Instagram"></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/"><img src="images/Youtube.svg" alt="Youtube"></a>
                            </li>
                        </ul>
                        <div class="advert">
                            <h3>Caviar à texture ferme</h3>
                            <img src="images/caviar-ferme.jpg" alt="Des bocaux en verre contenant des oeufs de truites">
                            <p>
                                L’ikura de truite à texture ferme est principalement livré en Europe occidentale et aux
                                États-Unis pour y être emballé dans des bocaux en verre. C'est un produit haut-de-gamme...
                            </p>
                        </div>
                    </aside>-->

            <footer class="main-footer">
                <ul>
                <li>&copy; Mes Bouquins - Tous droits réservés -</li>
                    <li><a href="#">Contact</a></li>

                </ul>

            </footer>
         





