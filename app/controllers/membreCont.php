<?php
class MembreCont{
    private $membre;
    private $session;
    public function __construct(){
        $this->membre = new MembreMod();
    }

    public function index(){
        require_once __DIR__ . '/../views/index.php';
    }
    public function creer(){
        if($_POST){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $sexe = $_POST['sexe'];

            if($this->membre->ajout_membre($nom, $prenom, $telephone, $email, $age, $sexe)){
                header('Location: /bibliotheque_app_web/app/views/membre/liste_membre.php');
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
        Session_gest::delete('email');
        Session_gest::delete('nom');
        Session_gest::delete('password_hash');
        Session_gest::delete('id');
        Session_gest::destroy();
    }
    public function lire_membre(){
        $resul = $this->membre->read();
        require_once __DIR__ . '/../views/membre/liste_membre.php';
    }
    
}
?>