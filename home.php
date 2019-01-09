<?php
session_start();
$hrline ='<hr class="hrline">';
$comp_short_name =$_SESSION['companyShortName'];
$comp_img = $_SESSION['companyLogo'];
$c_logo = "image/$comp_img";
$alt_text ="company logo";
$page_title = "Tuitelage.com Members Area";
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


if(!isset($_SESSION['user']))
{
header("Location: index.php");
}

include_once "layout_header.php";
?>

<p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user'].' @ '. $_SESSION['userCompany'];?>&nbsp;</small><a href="logout.php?logout">Sign Out</a> </p>
<div class="container-fluid col-12">
    <div class="container ">
        <div class="row">
            <!-- Training space start -->
            <center>
                <div class="col-md-10">
                    <div class="row card-columns">
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
                                    <h5 class="card-title">'.
                                        $lessonName . ' 
                                    </h5>
                                </div>
                                <p class="card-text">'.
                                    $lessonSummary .'
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
                </div>
            </center>
            <br>
            <hr>
        </div>
    </div>
</div>
<?php
// footer
include_once "layout_footer.php";
?>
