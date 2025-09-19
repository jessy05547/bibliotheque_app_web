<!-- page d'authentification -->
<?php
require_once __DIR__ . '/../../core/session_gest.php';
Session_gest::start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identification</title>
 </head>
 <body>
    
    <form action="/public/index.php?responsable/connexion" method="POST">
        <div class="gp">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="gp">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="gp">
            <button type="submit">Se connecter</button>
            <a href="/public/index.php?responsable/new">Créer un nouveau compte</a>
        </div>
    </form>
    <?php
    
    ?>
 </body>
 </html>