<?php ob_start();
session_start();
$title = "Login";
?>

    <article class="art-main">
        
    <h1>Authentification</h1>
      
    <form method="POST" action="login_action.php">
    <input type="text" name="login" placeholder="Saisissez votre login..." required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="submit" value="Se connecter">
</form>
    </article>
  


<?php
$contenu = ob_get_clean();
require "template/gabarit.php";
?>
</div>
</body>

</html>