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


if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);


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
<p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user']. $at . $comp_name;?>&nbsp;</small><a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log Out!</a>
    <a href="upload-lesson.php" style="float:right;">Upload Lesson</a></p>

<div id="mySidebar" class="sidebar">
    <br>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <br>
    <a href="home.php">Home</a>
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
    <a href="logout.php" t>Logout</a>
</div>
<div id="main">
    <center>
        <div id="lessonView" class="col-md-9 card">
            <br>
            <div>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <br id="brSU">
                <h3 id="lessonN" class="card-title">
                    <?php echo strtoupper($topicNameCap); ?>
                </h3>
            </div>
            <br>
            <p id="lessonS" class="text-justify">
                <?php echo $description; ?>
            </p>
            <br>
            <video src="video/<?php echo $videoUrl; ?>" class="img-responsive" loop controls autoplay></video>
            <br>
            <br>
            <br>
        </div>
        <br>
    </center>
</div>
<br>
<br>
<?php
// footer
include_once "layout_footer.php";
?>
<script src="js/script.js"></script>
