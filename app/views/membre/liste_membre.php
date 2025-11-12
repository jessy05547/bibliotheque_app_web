<?php include_once __DIR__ . '/../index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/membre_liste.css">
    <title>Document</title>
</head>
<body>
    <div class="tableau">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>TELEPHONE</th>
                    <th>COURRIEL</th>
                    <th>AGE</th>
                    <th>SEXE</th>
                    <th>DATE D'INSCRIPTION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resul as $row): ?>
                <tr>
                    <td><?= $row['membre_id'] ?></td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                    <td><?= $row['telephone'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td><?= $row['sexe'] ?></td>
                    <td><?= $row['date_inscription'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        // Forcer reload si la page est reprise depuis le back-forward cache
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload(true);
        }
    });
    </script>
</body>
</html>