<?php
require_once __DIR__ . '/../../config/database.php';

class MembreMod{
    private $conn;
    private $table = 'membre';
    private $table_resp = 'responsable';
    private $table_liv = 'livre';
    // livre
    public $livre_id;
    public $titre;
    public $auteur;
    public $type;
    public $edition;
    public $date_acquisition;
    
    // membre
    public $membre_id;
    public $responsable_id;
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $age;
    public $sexe;
    public $date_inscription;
    public $password;
    public $date_creation;
   
    public function __construct(){
        $com = new database();
        $this->conn = $com->getConnexion();
    }

    public function ajout_livre($titre, $auteur, $type, $edition, $date_acquisition){
        $query = "INSERT INTO " . $this->table_liv . "(titre, auteur, type_livre, edition, date_acquisition) VALUES (?,?,?,?,?)";
        if(!$this->conn) throw new Exception('No database connection');
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$titre, $auteur, $type, $edition, $date_acquisition]);
    }
    public function read_livre(){
        $query = "SELECT * FROM " . $this->table_liv;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $livre = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $livre;
    }
    public function ajout_membre($nom, $prenom, $telephone, $email, $age, $sexe, $date_inscription){
        $query = "INSERT INTO " . $this->table . "(nom, prenom, telephone, email, age, sexe, date_inscription) VALUES (?,?,?,?,?,?,?)";
        if (!$this->conn) throw new Exception('No database connection');
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nom, $prenom,$telephone,$email,$age,$sexe,$date_inscription]);
    }
    public function ajout_responsable($nom, $prenom, $telephone, $email, $password){
        $query = "INSERT INTO " . $this->table_resp . "(nom, prenom, telephone, email, password_hash) VALUES (?,?,?,?,?) ";
        // if (!$this->conn) throw new Exception('No database connection');
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$nom, $prenom, $telephone, $email, $password]);
    }
    public function authentification($email, $password){
        $query = "SELECT * FROM " . $this->table_resp . " WHERE email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function findEmail($email): ?array{
        $query = "SELECT * FROM " . $this->table_resp . "WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?:null;
    }
    public function read(){
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // public function supprime_membre($membre_id){
    //     if(isset($_GET['membre_id'])){
    //         $query = "DELETE FROM " . $this->table . "WHERE membre_id = ?";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->execute([$membre_id]);
    //     }
    // }
}
?>