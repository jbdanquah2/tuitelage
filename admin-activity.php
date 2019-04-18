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
        <div class="row" id="admin_acts">
            <center>
                <div class="col-md-10">
                <div class="card-columns" id="admin_cards">
                    <a href="upload-lesson.php">
  <div class="card bg-dark ">
    <div class="card-body">
    <div style="color:white;">
        <i class="material-icons md-48">book</i>
        </div>
      <h5 class="btn btn-dark">Add a fresh lesson</h5>
    </div>
  </div></a>

  <a href="upload-topic.php">
  <div class="card bg-success ">
    <div class="card-body">
    <div style="color:white;">
        <i class="material-icons md-48">library_add</i>
        </div>
      <h5 class="btn btn-success">Add a Topic</h5>
    </div>
  </div></a>

  <a href="upload-lesson-quiz.php">
  <div class="card bg-secondary ">
    <div class="card-body">
    <div style="color:white;">
        <i class="material-icons md-48">format_list_numbered</i>
        </div>
      <h5 class="btn btn-">Add Lesson quiz</h5>
    </div>
  </div></a>

  <a href="lesson-topic-quiz.php">
       <div class="card bg-warning">
    <div class="card-body">
    <div style="color:white;">
        <i class="material-icons md-48">notes</i>
        </div>
    <h5 class="btn btn-warning">Add Topic quiz</h5>
</div>
  </div></a>

  <a href="lesson-review.php">
       <div class="card bg-primary ">
    <div class="card-body">
    <div style="color:white;">
        <i class="material-icons md-48">library_books</i>
        </div>
    <h5 class="btn btn-primary">Review Lessons</h5>
</div>
  </div></a>

  <a href="lesson-review.php">
       <div class="card bg-info ">
    <div class="card-body">
    <div style="color:white;">
        <i class="material-icons md-48">help</i>
        </div>
    <h5 class="btn btn-info">Review quiz</h5>
</div>
  </div></a>

  

</div>
</center>
</div>
</div>
</div>
<br>
<br>
<?php
// footer
include_once "layout_footer.php";
?>