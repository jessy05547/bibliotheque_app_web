<?php require_once __DIR__ . '/../index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter de livre</title>
</head>
<body>
    <form action="/public/index.php?ajout/livre" method="post">
        <div class="lv">
            <input type="text" name="titre" id="" placeholder="Le titre du livre" required>
        </div>
        <div class="lv">
            <input type="text" name="auteur" id="" placeholder="Auteur du livre" required>
        </div>
        <div class="lv">
            <input type="text" name="type" id="" placeholder="Type de livre" required>
        </div>
        <div class="lv">
            <input type="text" name="edition" id="" placeholder="L'edition du livre" required>
        </div>
        <div class="lv">
            <input type="date" name="date_acquisition" required id="">
        </div>
        <div class="valid">
            <input type="submit" value="Enregistrer">
        </div>
    </form>
</body>
</html>