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
   $companyName ="";
   $companyShortName = "";
   $logoFileName = "";
   $companyPhone = "";
   $companyEmail = "";
   $companyWebsite = "";
   $firstName = "";
   $lastName = "";
   $email = "";
   $pssword = "";
   $c_pssword = "";
        echo("Registration Successful:  <a href='index.php'>Login Here</a>");
}
else{
echo("<span class='text-danger mb-0'>Registration Failed. Please try again</span>");

}

    }else {
        echo "<span class='text-danger mb-0 ml-2'>Sorry this is not a picture</span>";
    }

}else {
    $companyName ="";
    $companyShortName = "";
    $logoFileName = "";
    $companyPhone = "";
    $companyEmail = "";
    $companyWebsite = "";
    $firstName = "";
    $lastName = "";
    $email = "";
    $pssword = "";
    $c_pssword = "";
}
?>
<link rel="stylesheet" href="style/signup.css" type="text/css">

<div id="_signup" class="container">
    <h2 class="well">Registration Form</h2>
    <div class="row">
        <div class="col-md-8 offset-md-2 well">
            <form method="post" action="signup.php" enctype="multipart/form-data">
                <div class="class=" col-md-6 offset-md-3 col-sm-12"">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Company Name</label>
                            <input value="<?php echo $companyName; ?>" type="text" name="companyName" placeholder="eg: Vodafone Ghana Ltd" class="form-control" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Short Name</label>
                            <input value="<?php echo $companyShortName; ?>" type="text" name="companyShortName" placeholder="eg: Vodafone" class="form-control"> </div>
                        <div class="col-sm-6 form-group">
                            <label>Company Logo</label>
                            <input type="file" name="companyLogo" placeholder="eg: Company Logo" class="form-control" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Company Phone</label>
                            <input value="<?php echo $companyPhone; ?>" type="text" name="companyPhone" placeholder="eg: +233245052365" class="form-control"> </div>
                        <div class="col-sm-4 form-group">
                            <label>Company Email</label>
                            <input value="<?php echo $companyEmail; ?>" type="email" name="companyEmail" placeholder="eg: example@email.com" class="form-control" required> </div>
                        <div class="col-sm-4 form-group">
                            <label>Company Website</label>
                            <input value="<?php echo $companyWebsite; ?>" type="text" name="companyWebsite" placeholder="eg: www.example.com" class="form-control"> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input value="<?php echo $firstName; ?>" type="text" name="firstName" placeholder="eg: John" class="form-control" required> </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input value="<?php echo $lastName; ?>" type="text" name="lastName" placeholder="eg: Doe" class="form-control" required> </div>
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
            </form>
        </div>
    </div>
</div>
<br>
<?php
// footer
include_once "layout_footer.php";
?>
