<article class="main-article">
    <h1>
    <?= $page_titre1; ?>
    </h1>
    <img src="<?= base_url("images/tas-de-livres.jpg")?>" alt="Une personne vide un conteneur"/>
    <h2>Une petite présentation du site...</h2>
    <p>
        <strong>Pourquoi mes-bouquins.net ...</strong><br>
        Pour éviter cette situation, une scop, membre
        d'Emmaüs, a décidé de lancer un projet pilote de Relais connecté. Située
        à Chanteloup-les-Vignes, EBS Le Relais Val de Seine développe une activité
        de réinsertion sociale qui, tout comme les autres scop de l'union des Relais,
        est centrée sur la collecte, le tri, et la revalorisation des vieux textiles.
    </p>
    <h2>Recherche par mot clé ...</h2>    
    
    <!-- Titre : Moteur de recherche Multi Fonctions - MySQLi                                                         
    URL   : https://phpsources.net/code_s.php?id=169
    Auteur           : R@f                                                                                                
    Date édition     : 10 Mai 2006                                                                                        
    Date mise à jour : 18 Sept 2019                                                                                      
    Rapport de la maj: - refactoring du code en PHP 7 - fonctionnement du code vérifié                                                                                     -->

    <form style="text-align:center;" action="" method="post">
    <input type="radio" name="option" value="all" checked>Recherche tous les mots<br>
    <input type="radio" name="option" value="one">Rechercher un de ces mots<br>
    <input type="radio" name="option" value="sentence">Rechercher l'expression exacte<br>
    <input type="text" name="search" size="60"><br><br>
    <input type="submit" value="Rechercher" style="position:relative" onclick="lancerRechercheMotCle();">
    </form>

<?php

// Paramètres
//
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
 $table = 'conteneur';
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
    
</article>
