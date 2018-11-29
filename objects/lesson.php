<?php
class Lesson{
 
    // database connection and table name
    private $conn;
    private $table_name = "lesson";
 
    // object properties
    public $lessonId;
    public $lessonName;
    public $lessonSummary;
    public $descriptiveImage;
 
    public function __construct($db){
        $this->conn = $db;
        echo " i'm also connected";
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    lessonId, lessonName, lessonSummary, descriptiveImage
                FROM
                    " . $this->table_name . "
                ORDER BY
                    lessonName";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        while($r = $stmt->fetch(PDO::FETCH_ASSOC)){


          $lessonName = $r['lessonName'];
            $lessonSummary = $r['lessonSummary'];

         echo ' 

         <div class=" col-sm-6 t-material">
            <div class="card">
                <div class="card-body t-body">
                    <h5 class="card-title"> ';                       
                          echo $lessonName;
                echo '   </h5>
                    <p class="card-text">';
                    echo $lessonSummary ;
                    echo '</p><a href="#" class="btn btn-danger">View Lesson</a>
                </div>
            </div>
             </div>
        ';
            
        return $stmt;
    }
    }
    
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    lessonName=:lessonName, lessonSummary=:lessonSummary, descriptiveImage=:descriptiveImage";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->lessonName=htmlspecialchars(strip_tags($this->name));
        $this->lessonSummary=htmlspecialchars(strip_tags($this->price));
        $this->descriptiveImage=htmlspecialchars(strip_tags($this->description));
 
    
 
        // bind values 
        $stmt->bindParam(":lessonName", $this->lessonName);
        $stmt->bindParam(":lessonSummary", $this->lessonName);
        $stmt->bindParam(":descriptiveImage", $this->descriptiveImage);
       
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
}
?>
