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

if (isset($_GET['topicId'])){
//    $lessonId = $_GET['lessonId'];
    $topicId = $_GET['topicId'];
    $detailRows=$lesson->readTopicDetail($topicId);
    $topicRows = $detailRows->fetch(PDO::FETCH_ASSOC);
    $topicNameCap = $topicRows['topicName'];
    $description = $topicRows['description'];
    $videoUrl = $topicRows['videoUrl'];
}
?>
<link rel="stylesheet" href="style/lessonContent.css">

<center>

    <p class="alert alert-light" role="alert" id="_welcome">
        <small>Welcome
            <?php echo $_SESSION['user'].' @ '. $_SESSION['userCompany'];?>&nbsp;<a href="logout.php?logout">Sign Out</a></small>

    </p>
</center>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <br>
    <a href="lessonContent.php?lessonId=<?php echo $_SESSION['lessonId'] ?>">Overview</a>

    <?php
                        
$topic=$lesson->readTopic($_SESSION['lessonId']);
while($topicRow = $topic->fetch(PDO::FETCH_ASSOC)) {

$topicId    = $topicRow['topicId'];
$topicName = $topicRow['topicName'];
      
echo '
        <a href="lesson-topic.php?topicId='.$topicId.'">'.$topicName.'</a>';            
                    
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
        <div id="lessonView" class="col-md-9 card">
            <br>
            <div>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <br id="brSU">
                <h2 id="lessonN" class="card-title">
                    <?php echo $topicNameCap; ?>
                </h2>
            </div>
            <br>
            <p id="lessonS" class="text-justify">
                <?php echo $description; ?>
            </p>
            <br>
            <video src="video/<?php echo $videoUrl; ?>" class="img-responsive" loop controls></video>
            <br>
        </div>
        <br>
    </center>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
<script src="js/script.js"></script>
