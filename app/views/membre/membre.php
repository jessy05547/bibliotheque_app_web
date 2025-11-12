<?php require_once __DIR__ . '/../index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 
        action ==> chemin vers le routeur?action à faire dans le routeur.
    -->
    <form action="/public/index.php?membre_ajout" method="post" enctype="multipart/form-data">
        <div class="gp">
            <input type="text" name="nom" id="" placeholder="Votre nom">
        </div>
        <div class="gp">
            <input type="text" name="prenom" id="" placeholder="Votre prénom">
        </div>
        <div class="gp">
            <input type="text" name="telephone" id="" placeholder="telephone">
        </div>
        <div class="gp">
            <input type="email" name="email" id="" placeholder="votre email">
        </div>
        <div class="gp">
            <input type="text" name="age" id="" placeholder="votre age">
        </div>
        <div class="gp">
            <label for="sexe">Homme</label>
            <input type="radio" name="sexe" id="" value="Homme">
        </div>
        <div class="gp">
            <label for="sexe">Femme</label>
            <input type="radio" name="sexe" id="" value="Femme">
        </div>
        <div class="gp">
            <input type="file" name="image_membre" id="" accept="image/*" required>
        </div>
        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>