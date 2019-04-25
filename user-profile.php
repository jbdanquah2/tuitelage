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
<div id="_home" class="container-fluid">
  <div class="container">
    <div class="row">
      <center>
        <div class="col-md-6 col-sm-10"><br>
          <div class="card profile">
            <img class="card-img _image img-responsive" src="image/<?php
                  if($_SESSION['companyId'] ==  26){
                echo  $_SESSION['avatar'];
                  }else{
                echo  $_SESSION['companyLogo'];
                  }
                      ?>" width=700 height=200 alt="Card image">
                <div id="hide_p" class="card-body t-body">
                    <div class="car-img-overlay">
                        <h5 class="card-title text-center">
                        <?php echo  $_SESSION['user'].' '. $_SESSION['lastName'];  ?>
                        </h5>
                    </div>
                    <p class="card-text text-center">
                      <?php echo $_SESSION['userNameM'];  ?>
                    </p>
        
 <button onclick='hide_profile()' class='btn btn-danger card-link'>Change Password</button><br><hr>
              </div>
                <br>
                <div class="container" id="hide">
                <form method="post" action="user-password-change.php">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label><strong>Current Password</strong></label>
                        <input  type="password" name="pssword" placeholder="Current Password Here.." class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label><strong>New Password</strong></label>
                        <input  type="password" name="new_pssword" placeholder="New Password Here.." class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label><strong>Confirm New Password</strong></label>
                        <input  type="password" name="c_new_pssword" placeholder="Confirm New Password Here.." class="form-control" required>
                    </div>
                </div>
                <button type="submit" name="updatePassword"  class="btn btn-md btn-dark">Submit</button>
              </form>
              <br>
              <br>
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
