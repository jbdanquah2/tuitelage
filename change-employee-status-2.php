<?php
session_start();
$_SESSION['passwordStatus'] = "";
$_SESSION['changeStatus'] = "";
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
$motive = '';

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
<?php
    if(isset($_GET['updateStatus'])){
      // $_SESSION['userStatus'] = $rows['userStatus'];
    $rows=$appUser->updateUserStatus($_SESSION['email'], $_GET['userStatus']);
      if($rows){
    $st=  "<h5 class='btn btn-danger card-link'>Success: Status updated</h5> <br>";
    $stBa =  '<p><br><a href="view-employees.php?compId='.$_SESSION['companyId'].'">Back?</a>
    <a href="check-employee-quiz.php"></a></p>';
    $_SESSION['userStatus'] = $_GET['userStatus'];
    }else{
      echo   "<h5 class='btn btn-danger card-link'>Failed: Unable to update</h5><br><hr>";

    }
  }
?>

<div id="_home" class="container-fluid">
  <div class="container">
    <div class="row">
      <center>
        <div class="col-md-6 col-sm-10"><br>
          <div class="card profile">
            <img class="card-img _image img-responsive" src="image/<?php

                echo  $_SESSION['avatars'];

                      ?>" width=700 height=200 alt="Card image">
                <div class="card-body t-body">
                        <h5 class="card-title text-center">
                        <?php echo  $_SESSION['firstName'].' '. $_SESSION['lastName'];  ?>
                        </h5>
                    <center>
                      <?php echo $_SESSION['email'].'<br>Status: <span class="text-danger">'.$_SESSION['userStatus'].'</span>';
                        echo $st;
                        echo $stBa;
                      ?>

                    </center>
              </div>
        </div>
 </div>
                        <br>
                        <hr> </center>
                </div>
            </div>
        </div>
        <?php


// footer
include_once "layout_footer.php";
?>
