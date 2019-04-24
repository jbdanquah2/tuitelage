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

include_once "layout_header.php";
// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);


if(!isset($_SESSION['user']))
{
header("Location: index.php");
}

?>
<form method="post" action="edit.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-12">
                    <div align="center">
                    <img src="image/gad.jpg" height="300" width="300" class="up_image">
                    </div><br>
                        <div class="row">
                        
                        
                            <div class="col-sm-12 form-group">
                                <label>Change Photo</label>
                                <input type="file" name="avatar" placeholder="Your Photo" class="form-control">
                            </div>
                         
                            <div class="col-sm-12 form-group">
                                <label>First Name</label>
                                <textarea rows="1" type="text" name="firstName" placeholder="eg: John" class="form-control"> 
                                </textarea>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Last Name</label>
                                <textarea rows="1" type="text" name="lastName" placeholder="eg: Doe" class="form-control">
                                </textarea>
                                 </div>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <textarea rows="1" type="email" name="email" placeholder="eg: example@email.com" class="form-control">
                            </textarea>
                             </div>

                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="up_pssword" placeholder="" class="form-control" required> </div>

                        <div class="form-group" id="new_pass">
                        <label>New Password</label>
                            <input type="password" name="new_pssword" placeholder="New Password Here.." class="form-control" required> <br>
                            <label>Comfirm New Password</label>
                            <input type="password" name="con_new_pssword" placeholder="Confirm New Password Here.." class="form-control" required>
                             </div>
                            
                        
                    </div>
                </div>
                <br>
                <div class="container col-md-6 offset-md-3 col-sm-12">
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
<script>
var update_pass=document.getElementById("new_pass");
var cur_pass=document.getElementByName("pssword");
if (cur_pass.innerHTML!=""){
    update_pass.style.display="block";
}
</script>