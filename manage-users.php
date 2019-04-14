<?php
session_start();
$hrline ="";
$motive = "";
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

if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
?>
<div id="main" style="position:right;">
    <center>
        <div class="container">
            <br>
        <div class="row new_g">
        <h2>Manage Users</h2>
        <hr>
         </div>
        
         <br>
         <div class="card-deck">

         <div class="card t-material" id="lesson_t">
                         <a href="signup-2.php">   <div class="card-body t-body">
<div class=" im_regsponsive image_container">
<img src="icon/new_user.png" class="user_img" style="">
</div>

                               
                    
                 </div>
                 </a>
            </div>

        <div class="card t-material" id="lesson_t">
                            <div class="card-body t-body">
<div class=" im_regsponsive image_container">
<img src="image/sweetheart.jpg" class="user_img" style="">
</div>
<div class="centered row">
    <button class="btn btn-dark user_btn">
Review
    </button>
    <button class="btn btn-danger user_btn">
Delete
    </button>

</div>
                               
                    
                 </div>
                 
            </div>
            <div class="card  t-material" id="lesson_t">
                            <div class="card-body t-body">
<div class=" im_regsponsive image_container">
<img src="image/jbd.jpg" class="user_img" style="">
</div>
<div class="centered row">
    <button class="btn btn-dark user_btn">
Review
    </button>
    <button class="btn btn-danger user_btn">
Delete
    </button>

</div>
                               
                    
                 </div>
                 
            </div>
        </div>


        <div class="card t-material" id="lesson_t">
                            <div class="card-body t-body">
<div class=" im_regsponsive image_container">
<img src="image/gad.jpg" class="user_img" style="">
</div>
<div class="centered row">
    <button class="btn btn-dark user_btn">
Review
    </button>
    <button class="btn btn-danger user_btn">
Delete
    </button>

</div>
                               
                    
                 </div>
                 
            </div>


        </div>
        <br>
    </center>
</div>
<br>
<br>
<?php
// footer
include_once "layout_footer.php";
?>