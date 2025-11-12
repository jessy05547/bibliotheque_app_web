<?php
session_start();
require_once '../config/database.php';
require_once '../app/models/membreMod.php';
require_once '../app/controllers/membreCont.php';
require_once '../app/core/session_gest.php';

date_default_timezone_set('Africa/Nairobi');
$db = new database();
$conn = $db->getConnexion();
$membre = new MembreCont($conn);
$requete = $_SERVER['REQUEST_URI'];
/*
    le parse_url avec PHP_URL_QUERY : il decoupe l'url d'action.
    ex : url : index.php?membre_ajout ==> il prend 'membre_ajout';
*/
$lien = parse_url($requete, PHP_URL_QUERY);
$action = $lien;

    // echo "le lien est :" . $action;
$id = isset($_GET['membre_id']) ? $_GET['membre_id'] : null;
$action == 'responsable/connexion';

switch($action){
    case 'index':
        if($membre->dashboard()){
            $membre->index();
            include_once '../app/views/index.php';
        }else{
            include_once '../app/views/responsable/profil.php';
        }
        break;
    case 'membre_ajout':
        $membre->creer();
        break;
    case 'membre_creer':
        include_once '../app/views/membre/membre.php';
        break;
    case 'membre/liste':
        $membre->lire_membre();
        
        include_once '../app/views/membre/liste_membre.php';
        break;
    case 'livre/liste':
        $membre->lire_livre();
        include_once '../app/views/livre/livre.php';
        break;
    case 'responsable/inscription':
        $membre->creer_reponsable();
        include_once '../app/views/responsable/profil.php';
        break;
    case 'responsable/connexion':
        if($membre->identification_responsable($_POST['email'], $_POST['password'])){
            session_regenerate_id(true);
            include_once '../app/views/responsable/dashboard.php';
        }else{
            include_once '../app/views/responsable/profil.php';
        }
        break;
    case 'ajout/livre':
        $membre->ajout_livre();
        break;
    case 'reponsable/deconnexion':
        if($membre->deconnexion()){
            include_once '../app/views/responsable/profil.php';
        }else{
            include_once '../app/views/responsable/profil.php';
        }
        break;
    case 'responsable/profil':
        include_once '../app/views/responsable/profil.php';
        break;
    case 'new':
        include_once '../app/views/responsable/inscription.php';
        break;
    case 'dashboard':
        include_once '../app/views/responsable/dashboard.php';
        break;
    case 'ajout_livre':
        include_once '../app/views/livre/nouveau_livre.php';
        break;
    // case 'liste_livre':
    //     include_once '../app/views/livre/livre.php';
    //     break;
    case 'setting':
        include_once '../app/views/fonction/setting.php';
        require_once __DIR__ . '/../app/views/index.php';
        break;
    case 'membre/emprunt':
        include_once '../app/views/membre/emprunt.php';
        require_once __DIR__ . '/../app/views/index.php';
        break;
    case 'membre/retour':
        include_once '../app/views/membre/retour.php';
        require_once __DIR__ . '/../app/views/index.php';
        break;
    case 'notification':
            include_once '../app/views/fonction/notification.php';
            require_once __DIR__ . '/../app/views/index.php';
            break;
    case 'search':
        include_once '../app/views/fonction/search.php';
        require_once __DIR__ . '/../app/views/index.php';
        break;
    default:
        include_once '../app/views/responsable/profil.php';
        break;       
}
 ?>