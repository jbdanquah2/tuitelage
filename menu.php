<?php
$index__page = "/tuitelage/index.php";

if(!isset($_SESSION['user'])){
    return 0;
}
echo'<div class="row">
<!--  -->

<div id="com-menu" class="col-lg-6 col-sm-10" onmouseover="drag_menu()" onmouseout="un_drag_menu()">
<div id="un_drag_btn"><a class="btn btn-inline-dark" onclick="un_drag_menu()">
            &times;
            </a></div>
<a href="upload-lesson.php" class="btn btn-inline-dark">Manage Lessons</a>
<a href="" class="btn btn-inline-dark">Company Profile</a>
<a href="signup-2.php" class="btn btn-inline-dark">Add Users</a>
<a href="" class="btn btn-inline-dark">Profile</a>
<a href="logout.php?logout" class="btn btn-inline-dark">Log out</a>
</div>
</div>';
?>