<?php
session_start();
    if($_SESSION['companyId'] != 26) {
$comp_short_name =$_SESSION['companyShortName'];
$comp_img = $_SESSION['companyLogo'];
$c_logo = "image/$comp_img";
$alt_text =" ";
$page_title = "Tuitelage.com Members Area";        
        if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
    }
      

$hrline ='<hr class="hrline">';

$motive = 'Search your favorite lessons.  <form class="form-inline home-search">
            <input class="form-control" type="text" placeholder="Search favorite lesson">
            <button id="motive-search" class="btn btn-success-outline bg-dark" type="submit">Search </button>
        </form>';

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);



include_once "layout_header.php";
?>
<div id="com-menu" class="col-lg-6 col-sm-10">
    <a href="" class="btn-light">Manage Lessons</a>
    <a href="" class="btn-light">Company Profile</a>
    <a href="" class="btn-light">Add Users</a>
    <a href="" class=" btn-light">Profile</a>
    <a href="" class="btn-light">Log out</a>
</div>


<p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user'].' @ '. $_SESSION['userCompany'];?>&nbsp;</small><a href="logout.php?logout">Sign Out</a>
    <a href="upload-lesson.php" style="float:right;">Upload Lesson</a></p>

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
//            }catch(PDOException $exception){
//                echo " Sorry something went wrong";
//                die();
//            }
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
