<?php
session_start();

if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
header("Location: home.php");
}

if(isset($_GET['logout']))
{
session_destroy();
unset($_SESSION['user']);
unset($_SESSION['userCompany']);
unset($_SESSION['companyShortName']);
unset($_SESSION['companyId']);
unset($_SESSION['companyLogo']);
unset($_SESSION['lessonId']);
header("Location: index.php");
}
?>
