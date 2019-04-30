<?php
session_start();
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

?>

    <p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user']. $at . $comp_name;?>&nbsp;</small>
        <a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log Out!</a>
        <!-- <button id="drag_menu" class="btn btn-outline-dark" style="float:right;">
        ☰
    </button></p> -->
        <div id="_home" class="container-fluid col-12">
            <div class="container">
                <div class="row">
                    <center>
                        <div class="col-md-10">

                            <?php
 if (!isset($_POST['search'])){
   $numLesson =$lesson->numLessons($_SESSION['companyId']);
   if($numLesson == 0){
     echo "<div class='alert alert-info'><br>
     <center class='text-dark'><h4>OOooops! there are no lesson here yet</h4><br>
     <h5 onclick='drag_menu()' class='text-info'>Go ahead upload some lesson</h5> <br>
     <a href='upload-lesson.php' class='btn btn-dark text-white'>Click here</a>
     </center>
     </div>";
   }else {
$stmt=$lesson->readCompanyLesson($_SESSION['companyId']);
while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {

$lessonId = $rows['lessonId'];
$lessonName = $rows['lessonName'];
$lessonSummary = $rows['lessonSummary'];
$descriptiveImage = $rows['descriptiveImage'];

echo
                    '<div class="card  t-material" id="lesson_t">
                        <img class="card-img _image img-responsive" src="image/'. $descriptiveImage .'" width=700 height=200 alt="Card image">
                            <div class="card-body t-body">

                                <div class="car-img-overlay">
                                    <h5 class="card-title text-center">'.
                                        $lessonName.'
                                    </h5>
                                </div>
                                <p class="card-text text-justify">'.
                    $lesson->truncate($lessonSummary, 130).'
                                    </p>
                 <form action="lessonContent.php" method="GET">
                    <a class="btn btn-danger card-link" href="lessonContent.php?lessonId='.$lessonId.'">
                    View Lesson!</a>
                    </form>

                 </div>

            </div>'
            ;
}
}
     }else{
      $searchForm = $_POST['searchForm'];
   $stmt=$lesson->searchForQueryString($searchForm,$_SESSION['companyId']);
 }
?> </div>
                        <br>
                        <hr> </center>
                </div>
            </div>
        </div>
        <?php
// footer
include_once "layout_footer.php";
?>
