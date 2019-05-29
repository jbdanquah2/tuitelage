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
include_once 'objects/appUser.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$appUser = new appUser($db);

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
            <div class="container">
                <!-- <div class="row"> -->
                    <center>
                        <div class="col-md-10">

                            <?php
 if (isset($_GET['compId'])){
$stmt=$appUser->getEmployees($_SESSION['companyId'],$_SESSION['appUserId']);
while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {

  $_SESSION['firstNames'] = $rows['firstName'];
  $_SESSION['lastNames'] = $rows['lastName'];
  $_SESSION['emails'] = $rows['email'];
  $_SESSION['avatars'] = $rows['avatar'];
  $_SESSION['UserId'] = $rows['appUserId'];


echo
                    '<div class="card profile2  t-material" >
                        <img class="card-img _image img-responsive" src="image/'. $_SESSION["avatars"] .'" width=400 height=200 alt="Card image">
                            <div class="card-body t-body">

                                <div class="car-img-overlay">
                                    <h5 class="card-title text-center">'.
                                         $_SESSION["firstNames"].' '. $_SESSION["lastNames"].'
                                    </h5>
                                </div>
                                <center>'.
                    $_SESSION["emails"].'</center>
              <div class="btn btn-group">
                 <a href="check-employee-quiz.php?userEmail='.$_SESSION['emails'].'"  type="button"  class="btn btn-danger btn-sm mr-2"><small>Quiz(es) Taken</small></a>
                 <a href="change-employee-status.php?userEmail='.$_SESSION['emails'].'" type="button" onclick="hide_profile()" class="btn btn-sm btn-danger btn-inline"><small>Change Status</small></a><br>
              </div>
                 </div>
               </div>

            '
            ;
}
}
//}
?>
        </div>
    </center>
</div>

        <?php
// footer
include_once "layout_footer.php";
?>
