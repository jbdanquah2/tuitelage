<?php
class Lesson{
 
    // database connection and table name
    private $conn;
//    private $table_name = "lesson";
 
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
                    lesson
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
    <div class="car-img-overlay">
        <h5 class="card-title"> '
            . $lessonName .
            ' </h5>
    </div>
        <p class="card-text">' .
            $lessonSummary .
            '</p>
            <a href="lessonContent.php?lessonId='.$lessonId.'" class="btn btn-danger">View Lesson</a>
    
    </div>
</div>

';
     
}
}
    
function readCompanyLesson($companyId){
    
    try {
    //select all data
        $query = "SELECT
                    l.lessonId, l.lessonName, l.lessonSummary, l.descriptiveImage
                FROM 
                    lesson l 
                JOIN 
                    company_lesson cl 
                    ON
                    l.lessonId = cl.lessonId
                WHERE 
                    cl.companyId=:companyId
                ORDER BY
                    RAND()";  
 
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(":companyId"=>$companyId));
        
        
            
return $stmt;        
}catch (PDOException $ex){
echo $ex->getMessage();
        echo "Sorry Something went wrong. Contact Admin";
 }
 }
   
    
    
function readLessonDetail($LessonId){
    
    try {
    //select all data
        $query = "SELECT
                    l.lessonId, l.lessonName, l.lessonSummary, l.descriptiveImage
                FROM 
                    lesson l 
                JOIN 
                    company_lesson cl 
                    ON
                    l.lessonId = cl.lessonId
                WHERE 
                    cl.lessonId=:LessonId
                ORDER BY
                    RAND()";  
 
    $statement = $this->conn->prepare($query);
    $statement->execute(array(":LessonId"=>$LessonId));
    $detailRows = $statement->fetch(PDO::FETCH_ASSOC);

           
return $detailRows;

}catch (PDOException $ex){
echo $ex->getMessage();
        echo "hey didn't work";
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
