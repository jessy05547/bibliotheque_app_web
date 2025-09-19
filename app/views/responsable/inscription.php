<?php
require_once __DIR__ . '/../index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="/public/index.php?responsable/inscription" method="post">
        <div class="gp">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
        </div>
        <div class="gp">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>
        </div>
        <div class="gp">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" id="telephone" required>
        </div>
        <div class="gp">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="gp">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="gp">
            <label for="password_conf">Mot de passe confirmation</label>
            <input type="password" name="password_conf" id="password" required>
        </div>
        <div class="gp">
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</body>
</html>