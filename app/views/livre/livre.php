<?php require_once __DIR__ . '/../index.php'; ?>
<!-- Liste des livres - template vide à compléter -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/membre_liste.css">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Type de livre</th>
                <th>Edition</th>
                <th>Date d'acquisition</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($livre as $row):?>
            <tr>
                <td><?= $row['livre_id'] ?></td>
                <td><?= $row['titre'] ?></td>
                <td><?= $row['auteur'] ?></td>
                <td><?= $row['type_livre'] ?></td>
                <td><?= $row['edition'] ?></td>
                <td><?= $row['date_acquisition'] ?></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>