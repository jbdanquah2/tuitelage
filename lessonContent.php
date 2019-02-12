<?php
session_start();
$hrline ="";
$motive = "";

if($_SESSION['companyId'] != 26) {

    $comp_short_name =$_SESSION['companyShortName'];
    $comp_img = $_SESSION['companyLogo'];
    $c_logo = "image/$comp_img";
    $alt_text ="company logo";
    $page_title = "Tuitelage.com Members Area";        
        if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
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

if (isset($_GET['lessonId'])){
    $_SESSION['lessonId'] = $_GET['lessonId'];
    $dataRows=$lesson->readLessonDetail($_SESSION['lessonId']);
    $lessonName = $dataRows['lessonName'];
    $lessonSummary = $dataRows['lessonSummary'];
    $videoOverview = $dataRows['videoOverview'];
}
?>
<p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user'].' @ '. $_SESSION['userCompany'];?>&nbsp;</small><a href="logout.php?logout">Sign Out</a>
    <a href="upload-lesson.php" style="float:right;">Upload Lesson</a></p>

<div id="mySidebar" class="sidebar">
    <br>
    <a style="font-size:16px; color:#999;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <br>
    <br>
    <a class="topic" href="lessonContent.php?lessonId=<?php echo $_SESSION['lessonId'] ?>">Overview</a>

    <?php
                        
$topic=$lesson->readTopic($_SESSION['lessonId']);
while($topicRow = $topic->fetch(PDO::FETCH_ASSOC)) {

$topicId    = $topicRow['topicId'];
$topicName = $topicRow['topicName'];
      
echo '
        <a class="topic" onclick="closeNav()" href="lesson-topic.php?topicId='.$topicId.'">'.$topicName.'</a>';            
                    
}
?>
    <!--
<a href="#">Topic 1</a>
<a href="#">Topic 2</a>
<a href="#">Topic 3</a>
<a href="#">Topic 4</a>
-->
</div>
<div id="main">
    <center>
        <div class="col-md-9 card">
            <br>
            <div>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <br id="brSU">
                <h3 id="lessonN" class="card-title">
                    <?php echo strtoupper($lessonName); ?>
                </h3>
            </div>
            <br>
            <p id="lessonS" class="text-justify">
                <?php echo $lessonSummary; ?>
            </p>
            <br>
            <video src="video/<?php echo $videoOverview; ?>" class="img-responsive" loop controls autoplay></video>
            <br>
        </div>
        <br>
    </center>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
