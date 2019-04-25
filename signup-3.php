<?php
session_start();
$hrline ='<hr class="hrline">';
$page_title = "Tuitelage.com/Employee Setup";
$motive = "Let's get all employees on board!";

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

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
include_once 'objects/appUser.php';
include_once "layout_header.php";


// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);
$appUser = new appUser($db);

if(!isset($_SESSION['user']))
{
header("Location: index.php");
}

if(isset($_GET['compId'])) {
  $numEmploy =$appUser->numEmployee($_GET['compId']);
  if($numEmploy >= 5){
    echo "<div class='alert alert-light'><br><center class='text-dark'><h4>Please you can not add anymore employee</h4><br>
    <h5 class='text-info'>Maximum number of employees reached</h5> <br>
    <a href='home.php' class='btn btn-dark text-white'>Back to Home</a></center>
    </div>"
    ;
    die();
  }else {
    echo " ";
  }
}

if(isset($_POST['signup_btn'])) {
  $numEmploy =$appUser->numEmployee($_SESSION['companyId']);
  if($numEmploy >= 5){
    echo "<div class='alert alert-light'><br><center class='text-dark'><h4>Please you can not add anymore employee</h4><br>
    <h5 class='text-info'>Maximum number of employees reached</h5> <br>
    <a href='home.php' class='btn btn-dark text-white'>Back to Home</a></center>
    </div>"
    ;
    die();
  }else {
    $avatar = $_FILES['avatar']['name'];
    $tmp = explode(".",$avatar);
    $ext = end($tmp);
    $validExt = array("png","jpeg","jpg");

    if(in_array($ext,$validExt)){
       $photo = $_FILES['avatar']['tmp_name'];
       move_uploaded_file($photo,"image/$avatar");

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userType = $_POST['userType'];
        $email = $_POST['email'];
        $pssword = $_POST['pssword'];
        $c_pssword = $_POST['c_pssword'];

      if($pssword != $c_pssword){
          echo "<span class='text-danger mb-0 ml-2'>Registration Failed - Password Do not match</span>";

        }else if($pssword == $c_pssword){
          $appUser->createEmployee($avatar,$firstName,$lastName,$userType,$email,$pssword,$_SESSION['companyId'],$_SESSION['userName']);
                                       $avatar ="";
                                       $firstName = "";
                                       $lastName = "";
                                       $userType = "";
                                       $email = "";
                                       $pssword = "";
                                       $c_pssword = "";

        echo("Registration Successful:  <a href='home.php'>Go to home</a>");
              }else{
              echo("<span class='text-danger mb-0'>Registration Failed. Please try again</span>");
              }

  }else {
        echo "<span class='text-danger mb-0 ml-2'>Sorry this is not a picture</span>";
    }
    }
}else {
        $avatar ="";
        $firstName = "";
        $lastName = "";
        $userType = "";
        $email = "";
        $pssword = "";
        $c_pssword = "";
}
?>
<link rel="stylesheet" href="style/signup.css" type="text/css">

<div id="_signup" class="container">
    <div class="row">
        <div class="col-lg-12 well">
            <h2 class="well">Employee Setup</h2>
      <?php echo '<form method="post" action="signup-3.php?compId='.$_SESSION["companyId"].'" enctype="multipart/form-data">' ?>
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>First Name</label>
                                <input value="<?php echo $firstName; ?>" type="text" name="firstName" placeholder="eg: John" class="form-control" required> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Last Name</label>
                                <input value="<?php echo $lastName; ?>" type="text" name="lastName" placeholder="eg: Doe" class="form-control" required> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Your Photo</label>
                                <input type="file" name="avatar" placeholder="Your Photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Select Role</label>
                                <select name="userType" class="form-control" required>
                                  <option value="" selected>Select Role</option>
                                  <option value="admin">Admin</option>
                                  <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input value="<?php echo $email; ?>" type="email" name="email" placeholder="eg: example@email.com" class="form-control" required> </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input value="<?php echo $pssword; ?>" type="password" name="pssword" placeholder="eg: Enter Password Here.." class="form-control" required> </div>
                        <div class="form-group">
                            <label>Comfirm Password</label>
                            <input value="<?php echo $c_pssword; ?>" type="password" name="c_pssword" placeholder="eg: Confirm Password Here.." class="form-control" required> </div>
                        <button type="submit" name="signup_btn" class="btn btn-md btn-dark">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<?php
// footer
include_once "layout_footer.php";
?>
