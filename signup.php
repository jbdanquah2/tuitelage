<?php
// set page headers
$page_title = "Tuitelage.com/signup";
$motive = "Do you have a company? Sign Up here to start!";


// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
include_once 'objects/crud.php';


include_once "layout_header.php";

 
// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);
$crud = new crud($db);



if(isset($_POST['signup_btn'])) {
$companyName = $_POST['companyName'];
$companyShortName = $_POST['companyShortName'];
$companyPhone = $_POST['companyPhone'];
$companyEmail = $_POST['companyEmail'];
$companyWebsite = $_POST['companyWebsite'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$pssword = $_POST['pssword'];
    
if($crud->createUser($companyName, $companyShortName,$companyPhone,$companyEmail,
$companyWebsite,$firstName,$lastName,$email,$pssword)){
echo("Registration Successful");
}
else{
echo("Registration Failed");
}

}
     
 ?>

<div class="container">
    <h1 class="well">Registration Form</h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form method="post" action="">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Company Name</label>
                            <input type="text" name="companyName" placeholder="Enter Company Name Here.." class="form-control" required> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Short Name</label>
                            <input type="text" name="companyShortName" placeholder="Enter Short Name Here.." class="form-control"> </div>
                        <div class="col-sm-6 form-group">
                            <label>Industry</label>
                            <input type="text" name="companyIndustry" placeholder="Enter Type of Industry Here.." class="form-control"> </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Company Phone</label>
                            <input type="text" name="companyPhone" placeholder="Enter Phone Number Here.." class="form-control"> </div>
                        <div class="col-sm-4 form-group">
                            <label>Company Email</label>
                            <input type="text" name="companyEmail" placeholder="Enter Email Address Here.." class="form-control" required> </div>
                        <div class="col-sm-4 form-group">
                            <label>Company Website</label>
                            <input type="text" name="companyWebsite" placeholder="Enter Website Here.." class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" name="firstName" placeholder="Enter First Name Here.." class="form-control" required> </div>
                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastName" placeholder="Enter Last Name Here.." class="form-control" required> </div>
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control" required> </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pssword" placeholder="Enter Password Here.." class="form-control" required> </div>

                    <button type="submit" name="signup_btn" class="btn btn-lg btn-info">Submit</button>
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
<link rel="stylesheet" href="style/signup.css">
