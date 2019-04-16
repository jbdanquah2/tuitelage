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
<a href="upload-lesson.php" class="btn btn-inline-dark">
<i class="material-icons md-48">book</i>
Manage Lessons</a>
<a href="" class="btn btn-inline-dark">
<i class="material-icons md-48">build</i>
Company Profile</a>
<a href="manage-users.php?" class="btn btn-inline-dark">
<i class="material-icons md-48">book</i>
Manage Users</a>
<a href="" class="btn btn-inline-dark">
<i class="material-icons md-48">account_box</i>
Profile</a>
<a href="logout.php?logout" class="btn btn-inline-dark">
<i class="material-icons md-48">play_for_work</i>
Log out</a>
</div>
</div>';
$salute='<p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome '.$_SESSION['user']. $at . $comp_name . '</small><a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log out</a>'.
'<button class="btn btn-outline-dark drag_menu_1" id="drag_btn" onclick="drag_menu()" style="float:right;">
☰
</button></p>';

                       echo $salute;

?>
