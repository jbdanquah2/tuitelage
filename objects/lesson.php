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
     //  echo " i'm also connected";
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
                    l.lessonId, l.lessonName, l.lessonSummary, l.descriptiveImage,
                    l.videoOverview
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
    
function readCompanyLesson2($companyId){
    
    try {
    //select all data
        $query = "SELECT
                    l.lessonId, l.lessonName, l.lessonSummary, l.descriptiveImage,
                    l.videoOverview
                FROM 
                    lesson l 
                JOIN 
                    company_lesson cl 
                    ON
                    l.lessonId = cl.lessonId
                WHERE 
                    cl.companyId=:companyId
                ORDER BY
                   l.lessonName";  
 
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(":companyId"=>$companyId));
        
        
            
return $stmt;        
}catch (PDOException $ex){
echo $ex->getMessage();
        echo "Sorry Something went wrong. Contact Admin";
 }
 }
    
function deleteCompanyLesson($lessonId){
    
    try {
    //select all data
        $query = "
        DELETE
        FROM topic 
        WHERE topicId IN 
        (SELECT topicId FROM lesson_topic WHERE lessonId =:lessonId);
        
        DELETE FROM lesson WHERE lessonId =:lessonId;
        ";  
 
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(":lessonId"=>$lessonId));
                
return true;        
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
            echo '
            <div class="container row">
            <div class="alert alert-warning" id="our_alert" align="center">
            <strong>Too Bad!</strong> You forgot to type something to search for <p>Type in a key word</p> 
          </div>
          </div>' ;
        }
        else{
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
    $stmt = $this->conn->prepare($query);
    $searchKeyword=$queryString;
    $queryString = '%' . $queryString . '%';
        $stmt->bindParam(":queryString", $queryString);
        $stmt->bindParam(":companyId", $companyId);
    $stmt->execute();
$row_num=$stmt->rowCount();
    if($row_num==0){
            echo'
            <div class="container row colspan-6" id="empty-Search" >
            <div class="alert alert-warning" id="our_alert" align="center">
            <strong>Too Bad!</strong> Nothing was found for the keyword <b> '.$searchKeyword.'</b><p>Try Again!</p> 
          </div>
          </div>
            ';
            $nothing_Was_found='style="display:none;"';
            
             }

//NO RESULTS TO QUERY
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      //  $row_num=count($row);      
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
           $this->truncate($lessonSummary, 130) .
            '</p>
            <a href="lessonContent.php?lessonId='.$lessonId.'" class="btn btn-danger">View Lesson</a>
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
    
    
function readLessonQuiz($lessonId){
    
    try {
        $query = "SELECT q.quizId, q.question, q.optionA, q.optionB,
        q.optionC, q.status
FROM
    quiz q
JOIN 
    quiz_lesson ql on q.quizId = ql.quizId
WHERE
ql.lessonId=:lessonId";  
 
    $statement = $this->conn->prepare($query);
    $statement->execute(array(":lessonId"=>$lessonId));
// $detailRows = $statement->fetch(PDO::FETCH_ASSOC);
           
return $statement;

}catch (PDOException $ex){
echo $ex->getMessage();
        echo "hey didn't work";
 }
 }
    
function  qRowCount($lessonId){
    
    try {
        $query = "SELECT count(*)
FROM
    topic t
        JOIN
    lesson_topic lt ON t.topicId = lt.topicId
WHERE
    lt.lessonId=:LessonId";  
 
    $statement = $this->conn->prepare($query);
    $statement->execute(array(":LessonId"=>$lessonId));
 $detailRows = $statement->fetchColumn();

           
return $detailRows;

}catch (PDOException $ex){
echo $ex->getMessage();
        echo "hey didn't work";
 }
    
}

}
    
?>
