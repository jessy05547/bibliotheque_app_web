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
        $resul = $this->membre->read_livre();
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
            $date_inscription = date("Y-m-d ");

            $dossier = __DIR__ . '/../views/responsable/upload_responsable/';
            $fichier = basename($_FILES['image_responsable']['name']);
            move_uploaded_file($_FILES['image_responsable']['tmp_name'], $dossier . $fichier);
            $image_path = __DIR__ . '/../views/responsable/upload_responsable/' . $fichier;

            if($mdp === $conf){
                $password = password_hash($mdp, PASSWORD_BCRYPT);
                if($this->membre->ajout_responsable($nom, $prenom, $telephone, $email, $password, $date_inscription,$image_path)){
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
                Session_gest::set('responsable_path', $data['responsable_path']);
                Session_gest::set('prenom', $data['prenom']);
                Session_gest::set('telephone', $data['telephone']);
                Session_gest::set('date_creation', $data['date_creation']);
                return $data;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function deconnexion(){
        session_unset();
        Session_gest::destroy();
       
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }
    public function lire_membre(){
        $resul = $this->membre->read();
        require_once __DIR__ . '/../views/membre/liste_membre.php';
    }


    public function dashboard(){
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-ontrol: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        // header('Expires: 0');

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