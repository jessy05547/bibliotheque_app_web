<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
     <h1><?php  
         $mail =  Session_gest::get('email');
         echo "votre mail est " . htmlspecialchars($mail);
     ?></h1>
    <h1>tableau de bord</h1>
    <?php require_once __DIR__ . '/../index.php'; ?>
</body>
</html>