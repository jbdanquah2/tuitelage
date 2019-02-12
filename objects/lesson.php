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
    
    <img  class="card-img _image img-responsive" src="image/'. $descriptiveImage .'" width=700 height=200 alt="Card image">
    <div class="card-body t-body">
    <div class="car-img-overlay">
        <h5 class="card-title text-center"> '
            . $lessonName .
            ' </h5>
    </div>
        <p class="card-text">' .
            $lessonSummary .
            '</p>
            <a href="#" class="btn btn-danger">View Lesson</a>
    
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
                    l.lessonId, l.lessonName, l.lessonSummary, l.descriptiveImage, l.videoOverview
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
    
    
function readTopic($LessonId){
    
    try {
        $query = "SELECT t.topicId,
    t.topicName, t.description, t.videoUrl
FROM
    topic t
        JOIN
    lesson_topic lt ON t.topicId = lt.topicId
WHERE
    lt.lessonId=:LessonId";  
 
    $statement = $this->conn->prepare($query);
    $statement->execute(array(":LessonId"=>$LessonId));
//    $detailRows = $statement->fetch(PDO::FETCH_ASSOC);

           
return $statement;

}catch (PDOException $ex){
echo $ex->getMessage();
        echo "hey didn't work";
 }
 }
    
    
function readTopicDetail($topicId){
    
    try {
        $query = "SELECT topicId,
    topicName, description, videoUrl
FROM
    topic 
WHERE
topicId=:topicId";  
 
    $statement = $this->conn->prepare($query);
    $statement->execute(array(":topicId"=>$topicId));
// $detailRows = $statement->fetch(PDO::FETCH_ASSOC);
           
return $statement;

}catch (PDOException $ex){
echo $ex->getMessage();
        echo "hey didn't work";
 }
 }
    
    
    function createLesson($lessonName, $lessonSummary, $descriptiveImage, $videoOverview, $createdBy, $updatedBy, $companyId){
 
        //write query
        $query = "INSERT INTO lesson (lessonName, lessonSummary, descriptiveImage, videoOverview, createdBy, updatedBy)
        VALUES(:lessonName,:lessonSummary,:descriptiveImage,
                :videoOverview, :createdBy, :updatedBy);
              
              SET @lastId = last_insert_id();
              
              INSERT INTO company_lesson (companyId, lessonId, createdBy, updatedBy)
              VALUES(:companyId,@lastId, :createdBy, :updatedBy); 
                ";
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(":lessonName", $lessonName);
        $stmt->bindParam(":lessonSummary", $lessonSummary);
        $stmt->bindParam(":descriptiveImage", $descriptiveImage);
        $stmt->bindParam(":videoOverview", $videoOverview);
        $stmt->bindParam(":createdBy", $createdBy);
        $stmt->bindParam(":updatedBy", $updatedBy);
        $stmt->bindParam(":companyId", $companyId);

        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
    function createTopic($lessonId, $topicName, $description, $videoUrl, $createdBy, $updatedBy){
 
        //write query
        $query = "INSERT INTO topic (
        topicName, description, videoUrl, createdBy, updatedBy)
        VALUES(:topicName, :description, :videoUrl, :createdBy, :updatedBy);
              
              SET @lastId = last_insert_id();
              
              INSERT INTO lesson_topic (lessonId, topicId , createdBy, updatedBy)
              VALUES(:lessonId, @lastId, :createdBy, :updatedBy); 
                ";
 
        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(":topicName", $topicName);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":videoUrl", $videoUrl);
        $stmt->bindParam(":lessonId", $lessonId);
        $stmt->bindParam(":createdBy", $createdBy);
        $stmt->bindParam(":updatedBy", $updatedBy);

        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    
    
    public function searchForQueryString($queryString,$companyId){
        if(!$queryString){
            echo "
    <div class='container-fluid col-12'>
        <div class='container lesson-wrap'>

           <div class='row'>
                <center>
                    <div class='col-md-11'>
                    <div class='card  t-material' id='lesson_t'>
                    Please enter a word or phrase to search
                    </div>
                    </div>
                </center>
            </div>
        </div>
    </div>"
                 
                ;
        }else{
          $query =  "SELECT
                    l.lessonId, l.lessonName, l.lessonSummary, l.descriptiveImage
                FROM 
                    lesson l 
                JOIN 
                    company_lesson cl 
                    ON
                    l.lessonId = cl.lessonId
                WHERE 
                    cl.companyId=:companyId 
                AND
                    (lessonName LIKE :queryString or `lessonSummary` LIKE :queryString) 
                ORDER BY
                    RAND()";
     
    
//    $query = "SELECT * FROM `xxxx` WHERE (`xxxxxxx` like :queryString or `xxxxx` like :queryString) ";

    $stmt = $this->conn->prepare($query);
    $queryString = '%' . $queryString . '%';
        $stmt->bindParam(":queryString", $queryString);
        $stmt->bindParam(":companyId", $companyId);
//    $stmt->bindParam('queryString', $queryString, PDO::PARAM_STR);

    $stmt->execute();
//    if(empty($row) or $row == false)
//       return array();
//    else
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
{
            $lessonId = $row['lessonId'];
            $lessonName = $row['lessonName'];
            $lessonSummary = $row['lessonSummary'];
            $descriptiveImage = $row['descriptiveImage'];
echo '


<div class="card  t-material" id="lesson_t">
    
    <img  class="card-img _image img-responsive" src="image/'. $descriptiveImage .'" width=700 height=200 alt="Card image">
    <div class="card-body t-body">
    <div class="car-img-overlay">
        <h5 class="card-title text-center"> '
            . $lessonName .
            ' </h5>
    </div>
        <p class="card-text">' .
            $lessonSummary .
            '</p>
            <a href="#" class="btn btn-danger">View Lesson</a>
    
    </div>
</div>

';
 }    
}
}}
    
    // truncate string at word
function truncate($string, $limit, $break =" ", $pad = "...") {  
	
	if (strlen($string) <= $limit) return $string;
	
	if (false !== ($max = strpos($string, $break, $limit))) {
		 
		if ($max < strlen($string) - 1) {
			
			$string = substr($string, 0, $max) . $pad;
			
		}
		
	}
	
	return $string;
	
}
 
}
    
?>
