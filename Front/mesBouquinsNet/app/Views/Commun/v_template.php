<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Points de collecte du Relais, fake content">
        <meta name="author" content="La team de devant">
        <!-- <meta name="robots" content="none"> -->
        <link rel="stylesheet" href="<?= base_url("css/conteneurs.css")?>">
        <title>Points de collecte du Relais</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <script>
            // 100vh chrome mobile
            // https://css-tricks.com/the-trick-to-viewport-units-on-mobile/
            // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
            let vh = window.innerHeight * 0.01;
            // Then we set the value in the --vh custom property to the root of the document
            document.documentElement.style.setProperty('--vh', `${vh}px`);

            // We listen to the resize event
            window.addEventListener('resize', () => {
                // We execute the same script as before
                let vh = window.innerHeight * 0.01;
                document.documentElement.style.setProperty('--vh', `${vh}px`);
            });
        </script>
        <!-- favicon (attention chemins absolus):  https://realfavicongenerator.net/ -->
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("/apple-touch-icon.png")?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url("/favicon-32x32.png")?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("/favicon-16x16.png")?>">
        <link rel="manifest" href="<?= base_url("/site.webmanifest")?>">
        <link rel="mask-icon" href="<?= base_url("/safari-pinned-tab.svg")?>" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">
    </head>
<body>

<div class="page-wrapper">
    <div class="header-wrapper">
        <header class="main-header">
            <a class="header-logo" href="<?= base_url("Cconteneur/index")?>">Points de collecte</a>
            <label for="nav-toggle">
                <span class="nav-toogle-text">Afficher / Cacher le menu</span>
                <div class="nav-toggle-button">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </label>
            <input type="checkbox" id="nav-toggle">
            <nav class="main-nav">
                <ul>
                    <li class="active"><a href="<?= base_url()?>">Accueil</a></li>
                    <li><a href="<?= base_url("/Forum")?>">Forum</a></li>
                    <li><a href="<?= base_url("Cconteneur/index")?>">Les conteneurs</a></li>
                </ul>
            </nav>
            
        </header>
        <div class="header-img" alt="Un tas de vêtements"></div>
    </div>
    <div class="article-wrapper">
        
    <?php
     echo $contenu;
     ?>

    </div>
    <div class="footer-wrapper">
        <footer class="main-footer">
            <ul class="footer-links">
                <li><a href="#">&copy; Fake</a></li>
                <li><a href="#">Recrutement</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Mentions légales</a></li>
            </ul>
        </footer>
    </div>
</div>
</body>
</html>