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
if(isset($_GET['userEmail'])){
    $rows=$appUser->getUser(($_GET['userEmail']));
    $_SESSION['firstName'] = $rows['firstName'];
    $_SESSION['lastName'] = $rows['lastName'];
    $_SESSION['email'] = $rows['userName'];
    $_SESSION['avatars'] = $rows['avatar'];
    $_SESSION['UserId'] = $rows['appUserId'];
    $_SESSION['userStatus'] = $rows['userStatus'];
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
                <div id="hide_p" class="card-body t-body">
                        <h5 class="card-title text-center">
                        <?php echo  $_SESSION['firstName'].' '. $_SESSION['lastName'];  ?>
                        </h5>
                    <center>
                      <?php echo $_SESSION['email'].'<br>Status: <span class="text-danger">'.$_SESSION['userStatus'].'</span>';
                      ?>

                    </center>
              </div>
                <div class="container">
                <form method="GET" action="change-employee-status-2.php">
                <div class="row">
                      <div class="col-sm-12 form-group">
                          <label><strong>Change Status</strong></label>
                          <select name="userStatus" required>
                            <option value="" selected disabled >Select</option>
                            <option value="Active" >Active</option>
                            <option value="Inactive">Inactive</option>
                          </select>
                          <label><strong>Are you sure?</strong></label>
                      </div>
                  </div>
                  <button type="submit" name="updateStatus"  class="btn btn-sm btn-dark">Yes</button>
                  <button  type="submit" name="updateNot"  class="btn btn-sm btn-dark">No</button>

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
