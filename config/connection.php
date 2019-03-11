<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost"; 
    private $db_name = "db-tuitelage";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            
            //echo "hey i'm connected";
        }catch(PDOException $exception){
            echo "";
            die();
          // echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>
