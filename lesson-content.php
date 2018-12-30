<?php
session_start();
// set page headers

$page_title = "Tuitelage.com Members Area";
$motive = 'Search your favorite lessons.  <form class="form-inline home-search">
            <input class="form-control" type="text" placeholder="Search favorite lesson">
            <button class="btn btn-success-outline bg-dark" type="submit">Search </button>
        </form>';

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


<div class="container main-lesson">
    <h2 class="main-topic">
        Customer Service
    </h2>
    <h5>
        <small class="topic-preview">What is your role as Customer Service Representative?
            In every organization where they services to customers, there is definitely the need for deep understanding of customer service in order serve your customer to make them happy. With your customers, you have no one to provide services to and with providing services, your company can not make money.

        </small></h5>
    <div class="container">
        <div class="container">
            <h4 class="sub-topic">
                Who is Customer Service Personnel?
            </h4>
            <p class="topic-detail">A company provides a form of services or a product that is sold customers. This person that interact with customers to make sure the customer is satified and happy is called Customer Service Personnel</p>

        </div>
    </div>

</div>





<?php
// footer
include_once "layout_footer.php";
?>
