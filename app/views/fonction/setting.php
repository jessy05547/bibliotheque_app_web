<?php 
require_once __DIR__ . '/../index.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/setting.css">
    <title>Profil</title>
</head>
<body>

    <div class="conteneur">
        <h1>Profil du responsable</h1>
        <img src="<?= "/" . htmlspecialchars($path_reponsable);?>" alt="responsable image" id="profil_img">
        
        <div class="form-profil">
            <form action="" class="contenu-profil">
                <div class="groupe">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($nom); ?>" disabled>
                </div>
                <div class="groupe">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($prenom); ?>" disabled>
                </div>
                <div class="groupe">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($mail); ?>" disabled>
                </div>
                <div class="groupe">
                    <label for="telephone">Téléphone :</label>
                    <input type="text" name="telephone" id="telephone" value="<?php echo htmlspecialchars($telephone); ?>" disabled>
                </div>
                <div class="groupe">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" value="********" disabled>
                </div>
                <div class="groupe">
                    <label for="date_creation">Date de création :</label>
                    <input type="text" name="date_creation" id="date_creation" value="<?php echo htmlspecialchars($date_creation); ?>" disabled>
                </div>

                
            </form>
            <div class="groupe">
                    <button type="button" class="btn btn-primary">Modifier le profil</button>
            </div>
        </div>
        
    </div>
</body>
</html>