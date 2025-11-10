<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bootstrap-5.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- <p>paragraphe</p> -->
     <div class="image"></div>
    <div class="cor">
        <section>
            <a href="/public/index.php?membre/liste" class="menu_l"><img src="/public/img/utilisateurs-alt.png" alt="" id="img"><span class="lab">Adhérant</span></a>
            <a href="/public/index.php?liste_livre" class="menu_l"><img src="/public/img/livre-marque-page.png" alt="" id="img"><span class="lab">Livre</span></a>
            <a href="/public/index.php?dashboard" class="menu_l"><img src="/public/img/tableau-de-bord.png" alt="" id="img"><span class="lab">Tableau de bord</span></a>
            <p class="date"><?php echo date("l d F Y"); ?></p>
        </section>
        <footer>
            <a href="/public/index.php?setting" target="_blank" class="parametre"><?php 
                echo Session_gest::get('nom');
            ?></a>
            <a href="/public/index.php?deconnexion">Deconnexion</a>
            
        </footer>
        <div class="right">
            <nav>
                <div class="wrapper bo">
                    <div class="gip bo">
                        <div class="log">
                            <img src="/public/img/Gemini_Generated_Image_ae2i9bae2i9bae2i-removebg-preview.png" alt="" id="logo">
                        </div>
                        <ul id="liste bo">
                            <li><a href="/public/index.php?membre/emprunt" class="menu_n">Emprunt</a></li>
                            <li><a href="/public/index.php?membre/retour" class="menu_n">retour de livre</a></li>
                            <li><a href="/public/index.php?membre_creer" class="menu_n">ajout de membre</a></li>
                            <li><a href="/public/index.php?ajout_livre" class="menu_n">ajout de  livre</a></li>
                        </ul>
                        <div class="notification bo">
                            <a href="/public/index.php?search"><img src="/public/img/search.png" alt="" id="ic"></a>
                            <a href="/public/index.php?notification"><img src="/public/img/cloche.png" alt="" id="ic"></a>
                        </div>
                    </div>
                </div>
            </nav>
            <main>
        
        