<?php require_once __DIR__ . '/../index.php'; ?>
<!-- Liste des livres - template vide à compléter -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/membre_liste.css">
    <title>Liste de Livres</title>
</head>
<body>
    <?php
        foreach($resul as $row):
    ?>
    <!-- <button onclick="livre()">Nouveau</button> -->
    <div class="card-item">
        <?php
            $url = $row['image_path'];
            $coupe = strstr($url, 'app');
            $path_image = str_replace('\controllers/..', '', $coupe);
        ?>
        <a href="" class="card">
            <img src="<?= "/". htmlspecialchars($path_image); ?>" alt="" id="picture">
            <div class="text">
                <p><?= $row['titre'] ;?></p>
            </div>
        </a>
    </div>
    <?php
        endforeach;
    ?>
    <script src="/public/js/app.js"></script>
</body>
</html>