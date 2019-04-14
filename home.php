<?php
session_start();
if($_SESSION['companyId'] != 4) {
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

<!-- <div class="row">
   
<div id="com-menu" class="col-lg-6 col-sm-10">
    <a href="" class="btn btn-inline-dark">Manage Lessons</a>
    <a href="" class="btn btn-inline-dark">Company Profile</a>
    <a href="" class="btn btn-inline-dark">Add Users</a>
    <a href="" class="btn btn-inline-dark">Profile</a>
    <a href="" class="btn btn-inline-dark">Log out</a>
</div>
</div> -->


<div id="_home" class="container-fluid col-12">
    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-10">
                    <!--
                    <div class="container">
                        <div class="row card-columns">
-->
                    <?php
                   
 if (!isset($_POST['search'])){                       
$stmt=$lesson->readCompanyLesson($_SESSION['companyId']);
$row_num=$stmt->rowCount();
if($row_num==0){
    echo
                        '<div class="card  t-material" id="lesson_t">
                        <img class="card-img _image img-responsive" src="icon/plus-big.png" width=700 height=200 alt="Card image">
                            <div class="card-body t-body">

                                <div class="car-img-overlay">
                                    <h5 class="card-title text-center">
                                    No lessons Yet
                                    </h5>
                                </div>                
                 <form action="lessonContent.php" method="GET">
                    <a class="btn btn-danger card-link" href="upload-lesson.php">
                    Add a Lesson!</a>
                    </form>
                    
                 </div>
                 
            </div>'
            ;
}
while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {

$lessonId = $rows['lessonId'];
$lessonName = $rows['lessonName'];
$lessonSummary = $rows['lessonSummary'];
$descriptiveImage = $rows['descriptiveImage'];
if($descriptiveImage==""){
    $descriptiveImage="t.jpg";
    return $descriptiveImage;
}
      
echo
                        '<div class="card  t-material" id="lesson_t">
                        <img class="card-img _image img-responsive" src="image/'. $descriptiveImage .'" width=700 height=200 alt="Card image">
                            <div class="card-body t-body">

                                <div class="car-img-overlay">
                                    <h5 class="card-title text-center">'.
                                        $lessonName . ' 
                                    </h5>
                                </div>
                                <p class="card-text text-justify">'.
                    $lesson->truncate($lessonSummary, 130) .'
                                    </p>                 
                 <form action="lessonContent.php" method="GET">
                    <a class="btn btn-danger card-link" href="lessonContent.php?lessonId='.$lessonId.'">
                    View Lesson!</a>
                    </form>
                    
                 </div>
                 
            </div>'
            ;
}
     }else{
      $searchForm = $_POST['searchForm'];
   $stmt=$lesson->searchForQueryString($searchForm,$_SESSION['companyId']);
 }
?>
                </div>
                <br>
                <hr>
            </center>
        </div>
    </div>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
