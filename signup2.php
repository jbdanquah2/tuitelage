<?php
// set page headers
$page_title = "Tuitelage.com/signup";
$motive = "Do you have a company? Sign Up here to start!";
include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);
   
  
 ?>
<div class="container">
    <h1 class="well">Registration Form</h1>
    <div class="col-lg-12">
        <div class="row">
            <form>
                <div class="col-sm-12">
                    <h4>Contact Person</h4>

                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-group">
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
<link rel="stylesheet" href="style/signup.css">
