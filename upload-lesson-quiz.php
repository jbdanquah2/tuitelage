<?php
  session_start();
$hrline ="";
$motive = "";

if($_SESSION['companyId'] != 26) {
    $comp_short_name =$_SESSION['companyShortName'];
    $c_logo = "image/{$_SESSION['companyLogo']}";
    $alt_text ="company logo";
    $page_title = "Tuitelage.com Members Area";  
    $at = ' @ ';
    $comp_name = $_SESSION['userCompany'];
        
    }else {
    $_SESSION['userCompany']=$_SESSION['user'];
    $page_title = "Welcome {$_SESSION['userCompany']}!";
    $comp_short_name = $_SESSION['user'];
     $c_logo = "image/{$_SESSION['companyLogo']}";
    $at = '';
    $comp_name = '';
}


include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);


if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
 
if(isset($_POST['newTopicBtn'])){
$lessonId = $_POST['lessons'];
  $topicName = $_POST['topicName'];
    $description =  $_POST['description'];
    
    $videoUrl = $_FILES['videoUrl']['name'];
    $video = $_FILES['videoUrl']['tmp_name']; move_uploaded_file($video,"video/$videoUrl");
       
 $detailRows=$lesson->createTopic($lessonId, $topicName, $description, $videoUrl, $_SESSION['userName'], $_SESSION['userName']);  
    
}

?>

<div id="mySidebar" class="sidebar">
    <br>
    <a style="font-size:16px; color:#999;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <br>
    <br>
    <a class="topic" href="upload-lesson.php">Create Lesson</a>
    <a class="topic" href="upload-topic.php">Create Topic</a>
    <a class="topic" href="upload-lesson-quiz.php">Create Lesson Quiz</a>
    <a class="topic" href="upload-topic-quiz.php">Create Topic Quiz</a>
    <a class="topic" href="#">Review Lesson</a>
    <a class="topic" href="#">Review Quiz</a>
</div>
<div id="main">
    <center>
        <div class="col-md-6 card">
            <br>
            <div>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <br id="brSU">
                <br>
                <h3 id="lessonN" class="card-title">
                    Lesson Quiz
                </h3>
                <br>
            </div>
            <form class="form-group" name="AddTopic" method="POST" onsubmit="return Add_topic()" enctype="multipart/form-data">
                <!-- Select Lesson-->
                <div class="card text-black  mb-3" id="cards_holder_item" style="width:100%">
                    <div class="card-header"><b>Pick a Lesson</b></div>
                    <div class="card-body">
                        <select class="form-control" name="lessons" required>
                            <option value="0" selected>Pick a lesson</option>
                            <?php
                        
$lessonNames=$lesson->readCompanyLesson($_SESSION['companyId']);
while($lessonRow = $lessonNames->fetch(PDO::FETCH_ASSOC)) {

$lessonId    = $lessonRow['lessonId'];
$lessonName = $lessonRow['lessonName'];
      
echo '<option value="'.$lessonId.'">'.$lessonName.'</option>';
        ;     
}
?>
                        </select>
                    </div>

                </div>
                <!-- Select Topic-->
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><strong>Enter A Question for the Lesson</strong></div>
                    <div class="card-body">
                        <textarea class="form-control" rows="5" placeholder="lesson Summary" name="tQuestion" required>
                        </textarea>
                        <br>
                        <button class="btn btn-dark" type="reset" name="clear_button">Clear <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </div>
                </div>
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><b>Option A</b></div>
                    <div class="card-body">
                        <input class="form-control" type="text" name="toptionA" required>

                    </div>
                </div>
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><b>Option B</b></div>
                    <div class="card-body">
                        <input class="form-control" type="text" name="toptionB" required>
                    </div>
                </div>
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><b>Option C</b></div>
                    <div class="card-body">
                        <input class="form-control" type="text" name="toptionC" required>
                    </div>
                </div>
                <input type="submit" class="btn btn-dark" name="newTopicBtn">
            </form>
        </div>
    </center>
</div>

<?php
// footer
include_once "layout_footer.php";
?>
