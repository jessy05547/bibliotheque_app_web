<!-- page d'authentification -->
<?php
require_once __DIR__ . '/../../core/session_gest.php';
Session_gest::start();

// Si déjà authentifié, rediriger vers le tableau de bord
if (Session_gest::get('email')) {
    header('Location: /public/index.php?dashboard');
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
// if($_SERVER[''])
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bootstrap-5.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/public/style.css">
    <link rel="stylesheet" href="/public/css/profil.css">
    <title>Identification</title>
 </head>
 <body>
    <div class="parent">
        <h2 class="deux">Identification</h2>
    <form action="/public/index.php?responsable/connexion" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label" id="label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label" id="label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="un">
            <button type="submit" class="btn btn-primary">Se connecter</button>
                <a href="/public/index.php?new" class="btn btn-secondary" >Créer un nouveau compte</a>
        </div>
    </form>
    </div>
    
    <?php
    
    ?>
    <script src="/public/css/bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js"></script>
 </body>
 </html>