<?php
class database{
    private $servername = 'localhost';
    private $database   = 'bibliothèque';
    private $username   = 'root';
    private $password   = '';
    private $conn;

    public function __construct(){}
    public function getConnexion(){
        $this->conn = null;
        try{
            // Utiliser charset dans le DSN et options sécurisées
            $dsn = "mysql:host={$this->servername};dbname={$this->database};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            return $this->conn;
        }catch(PDOException $e){
            echo "Connexion failed " . $e->getMessage();
        }
    }
}
?>