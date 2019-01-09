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

if (isset($_GET['lessonId'])){
    $lessonId = $_GET['lessonId'];
    $dataRows=$lesson->readLessonDetail($lessonId);
    $lessonName = $dataRows['lessonName'];
    $lessonSummary = $dataRows['lessonSummary'];
}
?>


<center>

    <p class="alert alert-light" role="alert" id="_welcome">
        <small>Welcome
            <?php echo $_SESSION['user'].' @ '. $_SESSION['userCompany'];?>&nbsp;<a href="logout.php?logout">Sign Out</a></small>

    </p>
</center>

<div id="mySidebar" class="sidebar">

    <br>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <br>
    <br>
    <br>
    <a href="#">Overview</a>
    <a href="#">Lesson 1</a>
    <a href="#">Lesson 2</a>
    <a href="#">Lesson 3</a>
    <a href="#">Lesson 5</a>
</div>

<div id="main">
    <center>
        <div class="col-9 card">
            <br>
            <div>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <h2 id="lessonN" class="card-title">
                    <?php echo $lessonName; ?>
                </h2>
            </div>
            <br>
            <p id="lessonS">
                <?php echo $lessonSummary; ?>
            </p>
            <br>
            <video src="video/233546130647_status_675f833f18bf4d5982df260166e2ca53_001.mp4" class="img-responsive" controls></video>
            <br>
        </div>
    </center>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
