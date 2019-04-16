<?php
session_start();
if($_SESSION['companyId'] != 4) {
    $comp_short_name =$_SESSION['companyShortName'];
    $c_logo = "image/{$_SESSION['companyLogo']}";
    $alt_text ="company logo";
    $page_title = "Tuitelage.com Members Area";  
    $at = ' @ ';
    $comp_name = $_SESSION['userCompany'];
    $user_type=$_SESSION['userType'];
        
    }else {
    $_SESSION['userCompany']=$_SESSION['user'];
    $page_title = "Welcome {$_SESSION['userCompany']}!";
    $comp_short_name = $_SESSION['user'];
     $c_logo = "image/{$_SESSION['companyLogo']}";
    $at = '';
    $comp_name = '';
    $user_type=$_SESSION['userType'];
}

$hrline ='<hr class="hrline">';
$motive = 'Search your favorite lessons.  <form method="post" class="form-inline home-search">
            <input name="searchForm" class="form-control" type="text" placeholder="Search favorite lesson" required>
            <button id="motive-search" class="btn btn-success-outline bg-dark sbtn" type="submit" name="search">Search </button>
        </form>';

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

include_once "layout_header.php";

if ($user_type!="admin"){
    header("Location: home.php");
}

?>
<div id="_home" class="container-fluid col-12">
    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-10">
                <div class="card-columns" id="admin_cards">
                    <a href="upload-lesson.php">
  <div class="card bg-dark ">
    <div class="card-body">
        <div>
        <i class="material-icons md-48">chrome_reader_mode</i>
        </div>
      <h5 class="btn btn-dark">Add a fresh lesson</h5>
    </div>
  </div></a>

  <a href="upload-topic.php">
  <div class="card bg-success ">
    <div class="card-body">
    <div>
        <i class="material-icons md-48">chrome_reader_mode</i>
        </div>
      <h5 class="btn btn-success">Add a Topic</h5>
    </div>
  </div></a>

  <a href="upload-lesson-quiz.php">
  <div class="card bg-secondary ">
    <div class="card-body">
    <div>
        <i class="material-icons md-48">chrome_reader_mode</i>
        </div>
      <h5 class="btn btn-">Add Lesson quiz</h5>
    </div>
  </div></a>

  <a href="lesson-topic-quiz.php">
       <div class="card bg-warning">
    <div class="card-body">
    <div>
        <i class="material-icons md-48">chrome_reader_mode</i>
        </div>
    <h5 class="btn btn-waring">Add Topic quiz</h5>
</div>
  </div></a>

  <a href="lesson-review.php">
       <div class="card bg-primary ">
    <div class="card-body">
    <h5 class="btn btn-primary">Review Lessons</h5>
</div>
  </div></a>

  <a href="lesson-review.php">
       <div class="card bg-info ">
    <div class="card-body">
    <div>
        <i class="material-icons md-48">chrome_reader_mode</i>
        </div>
    <h5 class="btn btn-info">Review quiz</h5>
</div>
  </div></a>

  

</div>
</center>
</div>
</div>
</div>