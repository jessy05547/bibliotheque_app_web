<?php
session_start();
require_once '../config/database.php';
require_once '../app/models/membreMod.php';
require_once '../app/controllers/membreCont.php';
require_once '../app/core/session_gest.php';

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

$id = isset($_GET['membre_id']) ? $_GET['membre_id'] : null;

switch($action){
    case 'index':
        $membre->index();
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
    case 'responsable/inscription':
        $membre->creer_reponsable();
        break;
    case 'responsable/connexion':
        if($membre->identification_responsable($_POST['email'], $_POST['password'])){
            
            include_once '../app/views/responsable/dashboard.php';
        }else{
            include_once '../app/views/responsable/profil.php';
        }
        break;
    case 'deconnexion':
        include_once '../'
        break;
    case 'responsable/profil':
        include_once '../app/views/responsable/profil.php';
        break;
    case 'responsable/new':
        include_once '../app/views/responsable/inscription.php';
        break;
    case 'dashboard':
        include_once '../app/views/responsable/dashboard.php';
        break;
    default:
        include_once '../app/views/responsable/profil.php';
        
}
?>