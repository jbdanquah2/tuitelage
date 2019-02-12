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

if(isset($_POST['newLessonBtn'])){
    $lessonName = $_POST['lessonName'];
    $lessonSummary =  $_POST['lessonSummary'];
    
    $descriptiveImage = $_FILES['descriptiveImage']['name'];
    $image = $_FILES['descriptiveImage']['tmp_name']; move_uploaded_file($image,"image/$descriptiveImage");
    
    $videoOverview = $_FILES['videoOverview']['name'];
    $video = $_FILES['videoOverview']['tmp_name']; move_uploaded_file($video,"video/$videoOverview");
    
$detailRows=$lesson->createLesson($lessonName, $lessonSummary, $descriptiveImage,$videoOverview, $_SESSION['userName'], $_SESSION['userName'], $_SESSION['companyId']);
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
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
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
                <div id="chng-menu"> <button class="openbtn" onclick="openNav()">☰Menu </button></div>
                <br id="brSU">
                <br>
                <h3 id="lessonN" class="card-title">
                    Upload Lesson
                </h3>
                <br>
            </div>
            <form class="form-group" method="POST" name="newLesson" onsubmit="return Add_lesson()" enctype="multipart/form-data">
                <!-- Lesson title-->
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><b>Enter Lesson Title</b></div>
                    <div class="card-body">
                        <input class="form-control" type="text" placeholder="..." name="lessonName" required>
                    </div>
                </div>
                <!-- Lesson Summary-->
                <div class="card text-black  mb-3" id="cards_holder_item">
                    <div class="card-header"><b>Enter Lesson Summary</b></div>
                    <div class="card-body">
                        <textarea class="form-control" rows="5" placeholder="lesson Summary" name="lessonSummary" required>
                      </textarea>
                        <br>
                        <button class="btn btn-danger" type="reset" name="clear_button">Clear <span class="glyphicon glyphicon-trash"></span></button>
                    </div>
                </div>
                <!-- Descriptive Image-->
                <div class="card text-black mb-3">
                    <div class="card-header"><strong><b>Descriptive Image:</b></strong>
                    </div><input class="form-control btn btn-outline-dark" type="file" name="descriptiveImage" required>
                </div>
                <!-- Lesson video-->
                <div class="card text-black mb-3">
                    <div class="card-header"><strong><b>Introductory Video:</b></strong>
                    </div><input class="form-control btn btn-outline-dark" type="file" name="videoOverview" required>
                </div>
                <br>
                <div class="card text-black mb-3">
                    <input type="submit" class="btn btn-danger" name="newLessonBtn">

                </div>
            </form>
            <br>
        </div>
        <br>
    </center>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
