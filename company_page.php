<?php
// set page headers

$page_title = "Company.Tuitelage.com";
$motive = 'Search your favorite lessons.  <form class="form-inline home-search">
            <input class="form-control" type="text" placeholder="Search favorite lesson">
            <button class="btn btn-success-outline bg-dark" type="submit">Search </button>
        </form>';
include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
session_start();
// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);


if(!isset($_SESSION['user']))
{
header("Location: index.php");
}



?>

<link href="style/tuitlage_css.css" rel="stylesheet" type="text/css" />
<p>
    Welcome
    <?php echo $_SESSION['user'].' @ '. $_SESSION['userCompany']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
</p>
<div class="container-fluid col-12">


    <div class="container ">
        <div class="row">

            <!-- Training space start -->

            <div class="row">
                <div class="col-10 offset-sm-1 ">
                    <div class="row card-columns">


                        <?php
            try{
             $stmt = $lesson->read(); 


            }catch(PDOException $exception){
                echo " ";
                die();
//            echo "Connection error: " . $exception->getMessage();
            }


?>


                    </div>
                </div>


                <!-- Training space end-->

                <!-- Blog space start -->

                <!--                
                    
                    <!-- BLOG space end -->


                <br>
                <hr>

                <!-- Department end -->

            </div>
        </div>
    </div>
</div>


<?php
// footer
include_once "layout_footer.php";
?>
