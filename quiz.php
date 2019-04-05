<?php
session_start();
$hrline ='<hr class="hrline">';
$motive = "The best you can be comes from what you read. Let's have some fun studying!";
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
// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);

 ?>
    <p class="alert alert-light" role="alert" id="_welcome"> <small>Welcome
        <?php echo $_SESSION['user']. $at . $comp_name;?>&nbsp;</small>
        <a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log Out!</a></p>
    <br>
  <?php
    if (isset($_GET['getQuiz'])){
        $_SESSION['id'] = $_GET['getQuiz'];
    echo   ' <a class="btn btn-secondary card-link ml-2" href="lessonContent.php?lessonId='.$_SESSION['id'].'">Back To Lesson</a>';
      }
  ?>
<div class="container">
        <div class="col-md-8 offset-md-2 col-xs-10 offset-xs-1">
            <!-- <div class="row"> -->
                <div class="card" id="cards_holder">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">Questions</h5>
                          <?php echo '<h4 class="text-center">'. $_SESSION['lessonName'] .'</h4>' ?>
                        </div>
                        <?php
if (isset($_GET['getQuiz'])){
    $_SESSION['id'] = $_GET['getQuiz'];
    $count = 0;
   $quiz=$lesson->readLessonQuiz($_SESSION['id']);
    while($quizRow = $quiz->fetch(PDO::FETCH_ASSOC)) {
      $quizId = $quizRow['quizId'];
      $count = $count + 1;
      $question = $quizRow['question'];
      $optionA = $quizRow['optionA'];
       $optionB= $quizRow['optionB'];
       $optionC = $quizRow['optionC'];
       $status = $quizRow['status'];
echo '

<div class="card text-black  mb-2" id="cards_holder_item">
                <form>
                                <div class="card-header"><b>'.$count.'</b></div>
                                <div class="card-body">
                                    <p>'.
                                       $question .'
                                    </p>

                                    <!-- Responds -->
                                    <div class="container row">

                                            <input type="radio" name="ans" value="A"> '.$optionA.'
                                            <input type="radio" name="ans" value="B"> '.$optionB.'
                                            <input type="radio" name="ans" value="C"> '.$optionC.'

                                        </div>
                                        <br>
                                        <label>
                                            <h5>Answer:</h5>
                                    </label>
                        </div>
                    </div>
                </form>
';

    }
}
else if(!isset($_GET['getQuiz'])){
    echo'
    <div class="container row colspan-6" id="empty-Search" >
    <div class="alert alert-warning" id="our_alert" align="center">
    <strong>Lucky You!</strong> There You, There are no quizes here yet <p><a href="home.php" class="btn btn-warning">Back To Home</a></p>
  </div>
  </div>
    ';
}
else{
    echo"Hmmmmmmmmmmmmmmmmmmmmmmmmmmmm";
}


?>
                            <button type="button" class="btn btn-secondary">Submit <span class="glyphicon"></span> </button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
    <?php
// footer
include_once "layout_footer.php";
?>
