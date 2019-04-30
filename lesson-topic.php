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
    $_SESSION['topicName'] = $topicRows['topicName'];
    $description = $topicRows['description'];
    $videoUrl = $topicRows['videoUrl'];
}
?>
    <p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user']. $at . $comp_name;?>&nbsp;</small>
        <a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log Out!</a>
        <!--<a href="upload-lesson.php" style="float:right;">Upload Lesson</a></p>-->
        <?php
        include_once "sidebar2.php"; ?>
        <div id="main">
            <center>
                <div id="lessonView" class="col-md-9 card">
                    <br>
                    <div>
                        <div id="chng-menu">
                            <button class="openbtn" onclick="openNav()">☰Menu </button>
                        </div>
                        <br id="brSU">
                        <h3 id="lessonN" class="card-title">
                    <?php echo strtoupper($_SESSION['topicName']); ?>
                </h3>
                <?php
                $quizTaken=$lesson->getUserResult($_SESSION['appUserId'],$_SESSION['lessonId']);
                if($quizTaken == true){
                  echo ' <a href="quiz.php?getQuiz='.$_SESSION['lessonId'].'"><small>Retake Quiz</small></a>';
                }else {
                  echo ' <a href="quiz.php?getQuiz='.$_SESSION['lessonId'].'"><small>Take a Quiz</small></a>'; }?> </div>                    <br>
                    <p id="lessonS" class="text-justify">
                        <?php echo $description; ?>
                    </p>
                    <br>
                    <video src="video/<?php echo $videoUrl; ?>" class="img-responsive" loop controls autoplay></video>
                    <br>
                    <br>
                    <br> </div>
                <br> </center>
        </div>
        <br>
        <br>
        <?php
// footer
include_once "layout_footer.php";
?>
            <script src="js/script.js"></script>
