<?php
session_start();
$hrline ='<hr class="hrline">';
$page_title = "Tuitelage.com/signup";
$motive = "Do you have a company? Sign Up here to start!";


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

if(isset($_SESSION['user']))
{
header("Location: home.php");
}


if(isset($_POST['signup_btn'])) {
$companyName = $_POST['companyName'];
$companyShortName = $_POST['companyShortName'];
    $logoFileName = $_FILES['companyLogo']['name'];
    $tmp = explode(".",$logoFileName);
    $ext = end($tmp);
    $validExt = array("png","jpeg","jpg");
    
    if(in_array($ext,$validExt)){
       $logo = $_FILES['companyLogo']['tmp_name']; move_uploaded_file($logo,"image/$logoFileName");
        
        $companyPhone = $_POST['companyPhone'];
        $companyEmail = $_POST['companyEmail'];
        $companyWebsite = $_POST['companyWebsite'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $pssword = $_POST['pssword'];
        $c_pssword = $_POST['c_pssword'];

            if($pssword != $c_pssword){
                echo "Password Do not match";

            }else if($appUser->createUser($companyName, $companyShortName,$companyPhone,$companyEmail,
 $companyWebsite,$logoFileName,$firstName,$lastName,$email,$pssword)){
        echo("Registration Successful:  <a href='index.php'>Login Here</a>");
}
else{
echo("Registration Failed. Please try again");
    
}

    }else {
        echo "Sorry this is not a picture";
    }

}   
?>
<link rel="stylesheet" href="style/signup.css" type="text/css">

<div id="_signup" class="container">
    <h1 class="well">Registration Form</h1>
    <div class="row">
        <div class="col-lg-12 well">
            <form method="post" action="signup.php" enctype="multipart/form-data">
                <div class="col-sm-8 offset-2">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Company Name</label>
                            <input type="text" name="companyName" placeholder="Vodafone Ghana Ltd" class="form-control" Title="Enter the full name of the company here!" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Short Name</label>
                            <input type="text" name="companyShortName" placeholder="Vodafone" class="form-control"> </div>
                        <div class="col-sm-6 form-group">
                            <label>Company Logo</label>
                            <input type="file" name="companyLogo" placeholder="Company Logo" class="form-control" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Company Phone</label>
                            <input type="text" name="companyPhone" placeholder="+233245052365" class="form-control"> </div>
                        <div class="col-sm-4 form-group">
                            <label>Company Email</label>
                            <input type="email" name="companyEmail" placeholder="example@email.com" class="form-control" required> </div>
                        <div class="col-sm-4 form-group">
                            <label>Company Website</label>
                            <input type="text" name="companyWebsite" placeholder="www.example.com" class="form-control"> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" name="firstName" placeholder="John" class="form-control" required> </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastName" placeholder="Doe" class="form-control" required> </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="example@email.com" class="form-control" required> </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pssword" placeholder="Enter Password Here.." class="form-control" required> </div>
                    <div class="form-group">
                        <label>Comfirm Password</label>
                        <input type="password" name="c_pssword" placeholder="Confirm Password Here.." class="form-control" required> </div>
                    <button type="submit" name="signup_btn" class="btn btn-md btn-dark">Submit</button>
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
