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

if (isset($_GET['lessonId'])){
    $_SESSION['lessonId'] = $_GET['lessonId'];
    $dataRows=$lesson->readLessonDetail($_SESSION['lessonId']);
    $lessonName = $dataRows['lessonName'];
    $lessonSummary = $dataRows['lessonSummary'];
    $videoOverview = $dataRows['videoOverview'];
    $les_desc_img=$dataRows['descriptiveImage'];
}
?>

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
                <?php    echo ' <a href="quiz.php?getQuiz='.$_SESSION['lessonId'].'"><small>Take a Quiz</small></a>'; ?>
            </div>
            <br>
            <p id="lessonS" class="text-justify">
                <?php echo $lessonSummary; ?>
            </p>
            <br>
            
            
            <div class="container-vid">
<div class="c-video">
	<video id="les_video" autoplay class="video" src="video/<?php echo $videoOverview; ?>" poster="image/<?php echo $les_desc_img; ?>"></video>
	<div class="controls">
		 <div class="orange">
		 	<div class="orange-juice">
		 		
		 	</div>
		 </div>
		 <div class="buttons row" align="center">
<div>
		 	<button id="playpausebtn" class="play btn btn-dark" onclick="playPause()">
		 		<i class='fas fa-play' style='font-size:25px' id="play"></i>
		 		<i class='fas fa-pause' style='font-size:25px' id="pause"></i>
		 	</button>

		 	<button class="btn btn-dark" id="rewind" onclick="rewind()">
		 		<i class="fa fa-angle-double-left" style="font-size:24px" id="rewind"></i>
		 	</button>
		 	<button class="btn btn-dark" onclick="stop_it()">
		 		<i class="fa fa-stop" style="font-size:24px" id="stop_it"></i>
		 	
		 	</button>

		 	

		 	<button class="btn btn-dark" id="fastForward" onclick="fastForward()">
		 		<i class="fa fa-angle-double-right" style="font-size:24px" id="fastForward"></i>
		 	</button>

		 	<button  class="btn btn-dark" onclick="setvolume_mute()">
		 		<i class='fas fa-volume-up' style='font-size:24px' id="volume"></i>
		 		<i class='fas fa-volume-off' style='font-size:24px' id="muted"></i>
		 	</button>

		 	<!-- <button class="btn btn-dark" onclick="goFullscreen()">
		 		<i class="fa fa-expand" style="font-size:24px" id="to_full"></i>
		 		<i class="fa fa-compress" style="font-size:24px" id="to_small"></i>	
		 	</button> -->
</div>
		 	
		 	
		 </div>
	</div>
</div>	

</div>

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
