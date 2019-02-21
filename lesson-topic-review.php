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

?>

<center>
    <p class="alert alert-light" role="alert" id="_welcome">
        <small>Welcome
            <?php echo $_SESSION['user']. $at . $comp_name;?>&nbsp;</small><a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log Out!</a>
    </p>
</center>

<div id="mySidebar" class="sidebar">
    <br>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
    <br>
    <br>
    <a class="topic" href="upload-lesson.php">Create Lesson</a>
    <a class="topic" href="upload-topic.php">Create Topic</a>
    <a class="topic" href="upload-lesson-quiz.php">Create Lesson Quiz</a>
    <a class="topic" href="upload-topic-quiz.php">Create Topic Quiz</a>
    <a class="topic" href="lesson-review.php">Review Lesson</a>
    <a class="topic" href="#">Review Quiz</a>
</div>
<div id="main">
    <center>
        <div class="col-md-10 card">
            <br>
            <div>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <br id="brSU">
                <br>
                <h3 id="lessonN" class="m-2">
                    Topics Review
                </h3>
                <br>
            </div>
            <form method="POST">
                <!-- Select Lesson-->
                <div class="table-responsive-sm">
                    <table class="table table-striped table-bordered table-sm shadow-lg pl-4">
                        <caption>Topics Review</caption>
                        <tr>
                            <?php
                        
if(isset($_GET['lessonId'])){ 
     $lessonId = $_GET['lessonId'];
    $lessonName = $_GET['lessonName'];
  echo '                          <td colspan="4" class="mb-0" width=220><h5 class="mb-0">'.$lessonName.'</h5><br>
                                <div class="btn-group" role="group">
                                    <a class="btn btn-sm btn-info mr-1 mt-2" href="lessonContent.php?lessonId='.$lessonId.'">
                                        View Lesson
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <th>Topic</th>
                            <th>Description</th>
                            <th>Video</th>
                            <th>Action</th>
                        </tr>';
                       
//      echo $_GET['lessonId'];
   
$topicNames=$lesson->readTopic($lessonId);
while($topicRow = $topicNames->fetch(PDO::FETCH_ASSOC)) {
$topicId    = $topicRow['topicId'];
$topicName = $topicRow['topicName'];
$description = $topicRow['description'];
$videoUrl = $topicRow['videoUrl'];
   echo                 
                            '
                        
                            <tr>
                            <td width=250 style="word-break: break-all">'.$topicName.'</a><br>
                            <a name="view-topics" class="btn btn-sm btn-info mt-2" href="lesson-topic.php?topicId='.$topicId.'">
                                Watch Video</a>
                                </td>
                            <td width=500>'.$description.'</td>
                            <td width=150 style="word-break: break-all"><a target="_blank" href="video/'.$videoUrl.'">'.$videoUrl.'</a></td>
                            <td 
                            <div class="btn-group" role="group">
                            <a href="lesson-review.php?update='.$lessonId.'" class="btn btn-sm btn-warning m-1">Update</a>
                            <a href="#" class="btn btn-sm btn-danger m-1">Delete</a>
                            </div>
                            </td>';
                            }
if(isset($_GET['delete'])){
   $deleteLesson=$lesson->deleteCompanyLesson($_GET['delete']);
    echo ' <script>alert("Lesson Deleted")</script>';
} 
} 
?>

                    </table>
                </div>
            </form>
        </div>
    </center>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
