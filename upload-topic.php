<?php
  session_start();
$hrline ="";
$comp_short_name =$_SESSION['companyShortName'];
$comp_img = $_SESSION['companyLogo'];
$c_logo = "image/$comp_img";
$alt_text ="company logo";
$page_title = "Tuitelage.com Members Area";
$motive = "";

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

<center>
    <p class="alert alert-light" role="alert" id="_welcome">
        <small>Welcome
            <?php echo ucwords($_SESSION['user'].' @ '. $_SESSION['userCompany']);?>&nbsp;<a href="logout.php?logout">Sign Out</a></small>
    </p>
</center>

<div id="mySidebar" class="sidebar">
    <br>
    <a style="font-size:16px; color:#999;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <br>
    <br>
    <a class="topic" href="upload-lesson.php">Create Lesson</a>
    <a class="topic" href="upload-topic.php">Create Topic</a>
    <a class="topic" href="#">Review Lesson</a>
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
                    Upload Topic
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
                <div class="card text-black  mb-3" id="cards_holder_item" style="width:100%">
                    <div class="card-header"><b>Add a Topic</b></div>
                    <div class="card-body">
                        <input class="form-control" type="text" name="topicName" required>

                    </div>
                </div>
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><strong>Enter Topic Summary</strong></div>
                    <div class="card-body">
                        <textarea class="form-control" rows="5" placeholder="lesson Summary" name="description" required>
                        </textarea>
                        <br>
                        <button class="btn btn-danger" type="reset" name="clear_button">Clear <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </div>
                </div>

                <!-- Topic video-->
                <div class="card text-black mb-3">
                    <div class="card-header"><strong>Video:</strong></div>
                    <input class="form-control btn btn-outline-dark" type="file" name="videoUrl">
                    <br>
                    <input type="submit" class="btn btn-danger" name="newTopicBtn">
                </div>
            </form>
        </div>
    </center>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
