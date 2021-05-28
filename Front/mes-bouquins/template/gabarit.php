<?php ob_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Exemple de mise en page avec CSS grid layout, fake content">
        <meta name="author" content="Gwénaël LAURENT">
        <meta name="robots" content="none">
        <title><?=$title?></title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda&display=swap" rel="stylesheet"> 
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    </head>

    <body>
    <div class="container">


            <header class="main-head">
                <img src="images/logo.png" class="logo-banner" alt="Logo de la pisciculture du web">
                <blockquote>Le meilleur caviar de truite des Hauts-de-France</blockquote>
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
 <a href="login.php" class="signin-link">Connexion</a>
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
      <a href="#"><li><i class="fa fa-home" aria-hidden="true"></i></li></a>
      <hr>
      <p>Recherche :</p>
      <a href="#"><li>Avancée</li></a>
      <a href="#"><li>Par auteur</li></a>
      <a href="#"><li>Par Edition</li></a>
      <a href="#"><li>Par collection</li></a>
            <hr>
      <p>Forum :</p>
      <a href="#"><li>Forum 1</li></a>
      <a href="#"><li>Forum 2</li></a>
      <a href="#"><li>Forum 3</li></a>
    </ul>
  </div>
</nav>

        
<section class="main-content">

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
                <p>&copy; Pisciculture du Web Armentières - Tous droits réservés -
                    <a href="#">Contact</a>
                </p>
            </footer>
         





