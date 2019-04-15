<?php
  session_start();
$hrline ="";
$motive = "";
$lessonId=$_GET['lessonId'];


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

<div id="mySidebar" class="sidebar">
    <br>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
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
        <div class="col-md-10 card">
            <br>
            <div>
            <form>
                <button class="openbtn" onclick="openNav()">☰Menu </button>
                <br id="brSU">
                <br>
                <div>
                <?php 
                if (isset($_GET['lessonId'])){
                  $lessonId =$_GET['lessonId'];
                  $dataRows=$lesson->readLessonDetail($_SESSION['lessonId']);
                  $lessonName = $dataRows['lessonName'];
                  $lessonSummary = $dataRows['lessonSummary'];
                  $videoOverview = $dataRows['videoOverview'];
                  $les_desc_img=$dataRows['descriptiveImage'];
                
               echo ' <h3 id="lessonN" class="m-2">
                    '.$lessonName.'</h3>
                <br>
            </div>
            <div id="lesson_topic_review" style="">
            <br>


                        <!-- ReviewTopic-->
                        <div >
<form class="form-group" method="POST">
                            <div>
              <div  >
                
                  
        <div class="ig_container">
            
            <video controls>
                <source src="video/'.$videoOverview.'" type="video/mp4">
            </video>
   
        </div>
                  <div class="card-body left-bottom" id="vidbody">
                  <label style="color:black;"><h6>Add a New Video:</h6></label>
                    <div class="form-control btn btn-dark" id="up_vid">
                  <input type="file" name="update_video" >
                  </div>
    </div>
  </div>
  <fieldset>
    <legend>Description</legend>
    <div>
        <textarea type="text" rows="10" name="update_lesson_summary" class="editable_box">       
       '.$lessonSummary.'
    </textarea> 
        </div>
    </fieldset>

        
</div>';
}
?>

</div>

<?php 
$topic=$lesson->readTopic(26);
while($topicRow = $topic->fetch(PDO::FETCH_ASSOC)) {
$count=1;
    $topicId    = $topicRow['topicId'];
    $topicName = $topicRow['topicName'];
    $topicVid = $topicRow['videoUrl'];
    $topicDesc =$topicRow['description'];
?>

<div align="center">
    <header><h3>Topic Review</h3></header>
</div>
<div class="table-responsive">          
  <table class="table table-hover">
    <thead class="sticky-top">
      <tr>
        <th>#</th>
        <th>Topic Name</th>
        <th>Description</th>
        <th>Video</th>
        <th id="actions">Action</th>
        
      </tr>
    </thead>
<tbody>

   <?php 
   echo'   <tr>
        <td>'.$count.'</td>
        <td><textarea rows="2"class="form-control-md" name="topic_Title_update">
        '.$topicName.'
        </textarea></td>

        <td><textarea rows="5" cols="55" class="form-control-md" name="topic_Desc_update">
        '.$topicDesc.'
    </textarea></td>

        <td>
                  <input class="form-control btn btn-dark" style="width:100%;" type="file" name="update_video" >
                  <a class=" btn btn-dark" href="video/'.$topicVid.'" style="width:100%;" type="file" name="update_video" >
                  video
                  </a>
                  
        </td>
        <td class="row">
        <button class="btn btn-outline-danger" name="drop_topic" action="'
        .
        
        .'

        ">
        Update<svg-icon><src href="sprite.svg#si-glyph-delete" /></svg-icon>
    </button>
        <button class="btn btn-outline-danger" name="drop_topic">
            Delete <svg-icon><src href="sprite.svg#si-glyph-delete" /></svg-icon>
        </button>
        

        
        </td>
      </tr>';
}
      ?>
    </tbody>
  </table>
  </div>
  
<div align="center" id="update_btn">
    <input class="btn btn-success" type="submit" name="lesson_reviewed">
    </div>
</form>


                        </div>
                    </div>
    </center>
</div>

<?php
// footer
include_once "layout_footer.php";

?>