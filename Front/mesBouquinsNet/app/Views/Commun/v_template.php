<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="<?= $meta; ?>">
        <!-- <meta name="robots" content="none"> -->
        <link rel="stylesheet" href="<?= base_url("css/conteneurs.css")?>">
        <title><?= $titrePage; ?></title>
        <script>
                let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
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
    <!-- The sidebar -->
    <div class="header-wrapper">
        <header class="main-header">
            <a class="header-logo" href="<?= base_url("Caccueil/index")?>">Mes Bouquins.net</a>
               <!-- DEBUT DU CODE DE RECHERCHE --> 
                <!-- Titre : Moteur de recherche Multi Fonctions - MySQLi                                                         
                URL   : https://phpsources.net/code_s.php?id=169
                Auteur           : R@f                                                                                                
                Date édition     : 10 Mai 2006                                                                                        
                Date mise à jour : 18 Sept 2019                                                                                      
                Rapport de la maj: - refactoring du code en PHP 7 - fonctionnement du code vérifié-->
                <form style="text-align:center;" action="" method="post"><hr>

                <label class="control control-radio">Recherche tous les mots        
                    <input type="radio" name="option" value="all" checked="checked">
                    <div class="control_indicator"></div>   
                </label>
                <label class="control control-radio">Rechercher un de ces mots        
                    <input type="radio" name="option" value="one">  
                    <div class="control_indicator"></div>   
                </label>
                <label class="control control-radio">Rechercher l'expression exacte       
                    <input type="radio" name="option" value="sentence">
                    <div class="control_indicator"></div>   
                </label><hr>
                <div class="container-input-recherche">
                    <input type="text" name="search" size="30"><br><br>
                    <input type="submit" value="Rechercher" style="position:relative">
                </div>
                </form>
            <?php

            // Paramètres

            // $table: table dans laquelle effectuer la requête
            // $champs: champs dans lesquels la recherche est effectuées (si plusieurs
            // champs,
            //          $champs est un tableau)
            // $select: champs à récupérer
            // $order: champ de classement
            // $sens: ASC ou DESC
            // $limit_start: départ
            // $limit_nb: nombre d'enregistrements sélectionnés
            // $count: paramètre optionnel: Si est vide ou non-passé, la requête
            // est crée normalement. Sinon, il désigne le champ pour créer la requête
            // count()
            $table = 'mesbouquins';
            $champs = '*';	

                //début Fonction de recherche
                function requete($table,$champs,$select,$order,$sens,$limit_start,$limit_nb,
                $count='')
                {
                // option de recherche
                $option = $_POST['option'];
                // texte de recherche
                $search = $_POST['search'];       
                // si c'est le premier appel de la fonction
                if(!isset($fonction_requete))
                {
                static $fonction_requete = 1;      
                // si "Rechercher tous les mots" ou "Rechercher un de ces mots"
                if($option == 'all' || $option == 'one')
                {
                    // liste des mots
                    $mots = explode(' ', $search);         
                    // sépararateur
                    if($option == 'all')
                        $sep = ' AND ';
                    else
                        $sep = ' OR ';
                } // if($option == 'all' || $option == 'one')
                // "Rechercher l'expression exacte"
                else
                {
                    $mots = $search;
                    $sep = '';
                }
            } // if(!isset($fonction_requete))   
            if(!is_array($champs))
                $champs = array($champs);   
            if($option == 'all' || $option == 'one')
            {
                // pour savoir si on en est à la première itération ou non
                $i = 0;      
                // pour tous les mots
                foreach($mots as $mot)
                {
                    if(!$i)
                    {
                        $search = '~#^!|!^#~ LIKE \'%' . $mot . '%\'';
                        $i = 1;
                    }
                    else
                        $search .= $sep . '~#^!|!^#~ LIKE \'%' . $mot . '%\'';
                } // foreach($mots as $mot)
            } // if($option == 'all' || $option == 'one')
            else if($option == 'sentence')
                $search = '~#^!|!^#~ LIKE \'%' . $mots . '%\'';      
            $i = 0;   
            // début de requête
            if(empty($count))
                $req_search = 'SELECT ' . $select . ' FROM ' . $table . ' WHERE ';
            else
                $req_search = 'SELECT count(' . $count . ') FROM ' . $table . ' WHERE ';   
            // ajout des champs
            foreach($champs as $champ)
            {
                if(!$i)
                {
                    $req_search .= '( ' . str_replace('~#^!|!^#~', $champ, $search) .' ) ';
                    $i = 1;
                }
                else
                    $req_search .= 'OR ( ' . str_replace('~#^!|!^#~', $champ, $search) .
            ' ) ';
            }            
            if(empty($count))
                $req_search .= "ORDER BY $order $sens LIMIT $limit_start, $limit_nb";            
            return $req_search;
            }
            ?>
            <!-- FIN DU SCRIPt DE RECHERCHE -->

            <!-- DEBUT MENU BURGER KEVIN-------------------------------------- -->
            <nav role="navigation">
                <div id="menuToggle">
                    <!--
                    A fake / hidden checkbox is used as click reciever,
                    so you can use the :checked selector on it.
                    -->
                    <input type="checkbox" /> 
                    <span></span>
                    <span></span>
                    <span></span>                
                    <ul id="menu">
                    <a  href="<?= base_url("Caccueil/index")?>"><li>Accueil</li></a>
                    <a href="<?= base_url("/Forum")?>"><li>Forum</li></a>
                    <a href="<?= base_url("Crecherche/index")?>"><li>Livres</li></a>
                    <a href="<?= base_url("CrechercheCollection/index")?>"><li>Collections</li></a>
                    <a href="<?= base_url("CrechercheEdition/index")?>"><li>Éditions</li></a>
                    <a href="<?= base_url("CrechercheAuteur/index")?>"><li>Auteurs</li></a>
                    <a href="<?= base_url("Users/index")?>"><li>Utilisateurs</li></a>
                    </ul>
                </div>
            </nav>
            <!-- FIN MENU BURGER ---------------------------------- -->            
        </header>      
    </div>   

    <!-- DEBUT Du CONTENU PRINCIPAL ----------------------- -->
    <div class="article-wrapper">
    <?php
     echo $contenu;
     ?>
    </div>

    <!-- DEBUT Du FOOTER ----------------------- -->
    <div class="footer-wrapper">
        <footer class="main-footer">
            <ul class="footer-links">
                <li><a href="#">&copy; Mes-bouquins.net</a></li>
                <li><a href="<?= base_url("Cmentions/index")?>">Mentions légales</a></li>
            </ul>
        </footer>
    </div>
</div>
</body>
</html>