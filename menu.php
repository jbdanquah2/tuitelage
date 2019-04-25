<?php
if (!isset($_SESSION['user'])) {
$_SESSION['userType'] ="";
}
$type1 = 'admin';
$type2 = 'employee';
if ($_SESSION['userType'] == $type1){
$manageLesson = '<a href="upload-lesson.php" class="btn btn-inline-dark">Manage Lessons</a>';
$companyProfile ='<a href="" class="btn btn-inline-dark">Company Profile</a>';
$addEmployee = '<a href="signup-3.php?compId='.$_SESSION['companyId'].'" class="btn btn-inline-dark">Add Employee</a>';
}else if($_SESSION['userType'] == $type2) {
  $manageLesson ='';
  $companyProfile ='<a href="" class="btn btn-inline-dark">Company Profile</a>';
  $addEmployee ='';
}else {
  $manageLesson ='';
  $companyProfile ='';
  $addEmployee ='';
}
$index__page = "/tuitelage/index.php";

if(!isset($_SESSION['user'])){
    return 0;
}
echo'<div class="row">
<!--  -->

<div id="com-menu" class="col-lg-6 col-sm-10" onmouseover="drag_menu()" onmouseout="un_drag_menu()">
<div id="un_drag_btn"><a class="btn btn-inline-dark" onclick="un_drag_menu()">
            &times;
            </a></div>'
            .$manageLesson.
            // $companyProfile.
            $addEmployee.'
<a href="user-profile.php" class="btn btn-inline-dark">Profile</a>
<a href="logout.php?logout" class="btn btn-inline-dark">Log out</a>
</div>
</div>';
?>
