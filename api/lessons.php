<?php 
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/connection.php';
include_once '../objects/lesson.php';

$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);

$_SESSION['lessonId'] = 2;
if (isset($_SESSION['lessonId'])){
$topic = $lesson->readTopic($_SESSION['lessonId']);
$count = $topic->rowCount();
if($count > 0){

    $topics = array();
    $topics["body"] = array();
    $topics["count"] = $count;

while($topicRow = $topic->fetch(PDO::FETCH_ASSOC)) {
     extract($topicRow);

    $t  = array(
              "topicId" => $topicId,
              "topicName" => $topicName,
              "description" => $description,
              "videoUrl" => $videoUrl
    
    );
    
    array_push($topics["body"], $t);
    
    }
  echo json_encode($topics);
}
else {
http_response_code(404);
    echo json_encode(
        array("body" => array(), "count" => 0)
//        echo json_encode(
// array("message" => "No products found.")
    );
    }
}
?>
