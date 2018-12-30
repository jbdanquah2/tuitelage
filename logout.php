<?php
session_start();

if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
else if(isset($_SESSION['user'])!="")
{
header("Location: company_page.php");
}

if(isset($_GET['logout']))
{
session_destroy();
unset($_SESSION['user']);
unset($_SESSION['userCompany']);
    
header("Location: index.php");
}
?>
