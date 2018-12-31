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
//        echo " i'm also connected";
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT
                    lessonId, lessonName, lessonSummary, descriptiveImage
                FROM
                    " . $this->table_name . "
                ORDER BY
                    RAND()";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $lessonId = $row['lessonId'];
            $lessonName = $row['lessonName'];
            $lessonSummary = $row['lessonSummary'];
            $descriptiveImage = $row['descriptiveImage'];
echo '


<div class="card  t-material" id="lesson_t">
    <div class="card-body t-body">
    <img  class="card-img _image img-responsive" src="image/'. $descriptiveImage .'" width=700 height=200 alt="Card image">
    <div class="card-img-overlay">
        <h5 class="card-title"> '
            . $lessonName .
            ' </h5>
    </div>
        <p class="card-text">' .
            $lessonSummary .
            '</p>
            <a href="lesson-content.php" class="btn btn-danger">View Lesson</a>
    
    </div>
</div>

';
            
        // return $stmt;
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
        $stmt->bindParam(":lessonSummary", $this->lessonSummary);
        $stmt->bindParam(":descriptiveImage", $this->descriptiveImage);
       
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
 
}
?>
