<?php
session_start();
$hrline ='<hr class="hrline">';
$page_title = "Tuitelage.com/signup";
$motive = "Sign Up here to explore our free lessons!";


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

// if(isset($_SESSION['user']))
// {
// header("Location: home.php");
// }


if(isset($_POST['signup_btn'])) {
    $avatar = $_FILES['avatar']['name'];
    $tmp = explode(".",$avatar);
    $ext = end($tmp);
    $validExt = array("png","jpeg","jpg");
    
    if(in_array($ext,$validExt)){
       $photo = $_FILES['avatar']['tmp_name'];
        move_uploaded_file($photo,"image/$avatar");
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $pssword = $_POST['pssword'];
        $c_pssword = $_POST['c_pssword'];

            if($pssword != $c_pssword){
                echo "Password Do not match";

            }else if($appUser->createGuestUser($avatar,
                           $firstName,
                           $lastName,
                           $email,
                           $pssword)){
                    echo("Registration Successful:  <a href='index.php'>Login Here</a>");
            }else{
                echo("Registration Failed. Please try again");
            }

    }else {
        echo "Sorry this is not a picture";
    }
}   
?>
<link rel="stylesheet" href="style/signup.css" type="text/css">

<div id="_signup" class="container">
    <div class="row">
        <div class="col-lg-12 well">
            <h1 class="well">
                <?php
                if(isset($_SESSION['companyId'])&&$_SESSION['companyId'] !=  4){
                    echo'Add New Employee';
                }
                echo'Registration Form';
            ?>
            </h1>
            <form method="post" action="signup-2.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>First Name</label>
                                <input type="text" name="firstName" placeholder="eg: John" class="form-control" required> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastName" placeholder="eg: Doe" class="form-control" required> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Your Photo</label>
                                <input type="file" name="avatar" placeholder="Your Photo" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="eg: example@email.com" class="form-control" required> </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pssword" placeholder="eg: Enter Password Here.." class="form-control" required> </div>
                        <div class="form-group">
                            <label>Comfirm Password</label>
                            <input type="password" name="c_pssword" placeholder="eg: Confirm Password Here.." class="form-control" required> </div>
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
