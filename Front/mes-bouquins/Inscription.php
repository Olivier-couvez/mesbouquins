<?php ob_start();
session_start();
$title = "Login";
?>

    <article class="art-main">
        
    <h1>Inscription</h1>



    <div class="parent">
<div class="div1">  
            <img src="./images/bibliotheque-livres.jpg" class="img-fluid" alt="Bliothèque Mes Bouquins">
            
     <form method="POST" action="login_action.php">
     <label for="Inscription">Entrez votre nom d'utilisateur</label><br>
    <input type="text" name="login" placeholder="Saisissez votre login..." required><br>
    <label for="Mdp">Entrez votre Mot de passe</label><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <input type="submit" value="Créer un compte">
</form>
<hr>
<div class="d-grid gap-2 col-6 mx-auto">
  <button  class="btnConnexion" type="button"><a href="./login.php">Connectez-vous</button>
 
</div></div>
</div>



           
      

    
      
    

    </article>
  


<?php
$contenu = ob_get_clean();
require "template/gabarit.php";
?>
</div>
</body>

</html>