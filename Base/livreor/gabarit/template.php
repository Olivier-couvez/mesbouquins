<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Exemple de mise en page avec CSS grid layout, fake content">
        <meta name="author" content="Gwénaël LAURENT">
        <meta name="robots" content="none">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <div class="container">
            <header class="main-head">
                <blockquote>Ecrivez un mot</blockquote>
            </header>

            <section class="main-content">
               <?= $contenu; ?>
            </section>   

<footer class="main-footer">
                <p>&copy; Le Livre d'Or - Tous droits réservés -
                    <a href="#">Contact</a>
                </p>
            </footer>
        </div>
    </body>

</html>