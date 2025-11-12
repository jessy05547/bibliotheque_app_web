<?php require_once __DIR__ . '/../index.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1><?php  
       $mail =  Session_gest::get('email');
       echo "votre mail est " . htmlspecialchars($mail);
    ?></h1>

    <h1>tableau de bord</h1>
    
    <script>
        // Forcer reload si la page est chargée depuis le back-forward cache
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                window.location.reload(true);
            }
        });
    </script>
</body>
</html>