<?php
class MembreCont{
    private $membre;
    // private $livre;
    private $session;
    public function __construct(){
        $this->membre = new MembreMod();
    }

    public function index(){
        require_once __DIR__ . '/../views/responsable/profil.php';
    }
    public function ajout_livre(){
        if($_POST){
            $titre = $_POST['titre'];
            $code  = $_POST['code'];
            $auteur = $_POST['auteur'];
            $type = $_POST['type'];
            $edition = $_POST['edition'];
            $date_acquisition = date("Y-m-d H:i:s");

            $dossier = __DIR__ . '/../views/livre/upload/';
            $fichier = basename($_FILES['photo_livre']['name']);

            move_uploaded_file($_FILES['photo_livre']['tmp_name'], $dossier . $fichier);
            $photo_livre = __DIR__ . '/../views/livre/upload/' . $fichier;
            
            if($this->membre->ajout_livre($titre,$code, $auteur, $type, $edition, $date_acquisition, $photo_livre)){
                exit;
            }
        }
        require_once __DIR__ . '/../views/index.php';
    }
    public function lire_livre(){
        $livre = $this->membre->read_livre();
        require_once __DIR__ . '/../views/livre/livre.php';
    }
    public function creer(){
        if($_POST){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $sexe = $_POST['sexe'];
            $date_inscription = date("Y-m-d ");

            $dossier = __DIR__ . '/../views/membre/upload_membre/';
            $fichier = basename($_FILES['image_membre']['name']);
            move_uploaded_file($_FILES['image_membre']['tmp_name'], $dossier . $fichier);
            
            $membre_path = __DIR__ . '/../views/membre/upload_membre/' . $fichier;

            if($this->membre->ajout_membre($nom, $prenom, $telephone, $email, $age, $sexe, $date_inscription, $membre_path)){
                // header('Location: /bibliotheque_app_web/app/views/membre/liste_membre.php');
                exit;
            }
        }
        require_once __DIR__ . '/../views/index.php';
    }
    public function creer_reponsable(){
        if($_POST){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $mdp = $_POST['password'];
            $conf = $_POST['password_conf'];

            if($mdp === $conf){
                $password = password_hash($mdp, PASSWORD_BCRYPT);
                if($this->membre->ajout_responsable($nom, $prenom, $telephone, $email, $password)){
                header('Location: /bibliotheque_app_web/app/views/responsable/profil.php');
                exit;
                }
            }
        }
        require_once __DIR__ . '/../views/responsable/inscription.php';
    }
    public function identification_responsable($email, $password){
        $data = $this->membre->authentification($email, $password);
        if($data){
            if(password_verify($password, $data['password_hash'])){ 
                Session_gest::set('email', $data['email']);
                Session_gest::set('password_hash', $data['password_hash']);
                Session_gest::set('nom', $data['nom']);
                Session_gest::set('id', $data['responsable_id']);
                return $data;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function deconnexion(){
        session_gest::delete('email');
        session_gest::delete('nom');
        session_gest::delete('password_hash');
        session_gest::delete('id');
        Session_gest::destroy();
        // Empêcher le cache des pages protégées
if(Session_gest::get('email')){
            header('Cache-Control: no-store, no-cache, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            header('Location : ../views/responsable/profil.php');
            exit;
        }else{
            header('Location: ../views/index.php'); 
            exit;
        }
    }
    public function lire_membre(){
        $resul = $this->membre->read();
        require_once __DIR__ . '/../views/membre/liste_membre.php';
    }


    public function dashboard(){
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-ontrol: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Expires: 0');

        if(empty(Session_gest::get('email'))){
            header('Location: ../views/responsable/profil.php');
            exit;
        }
    }
    public function cache(){
        $mail = Session_gest::get('email');
        $password = Session_gest::get('password_hash');
        $array = [$mail, $password];
        
        if($array){
            return true;
        }else{
            return false;
        }
    }
}
?>