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
    if (isset($_GET['submitQuiz'])){
    echo   ' <a class="btn btn-secondary card-link ml-2" href="lessonContent.php?lessonId='.$_SESSION['id'].'">Back To Lesson</a>';
      }
  ?>
<div class="container">
        <div class="col-md-8 offset-md-2 col-xs-10 offset-xs-1">
            <!-- <div class="row"> -->
                <div class="card" id="cards_holder">
                    <div class="card-body">
                        <div>
<!-- <h5 class="card-title text-primary">RESULTS: <?php //  echo $result .'/'.$count?></h5> -->
                          <?php echo '<h4 class="text-center">'. $_SESSION['lessonName'] .'</h4>' ?>
                        </div>
                        <form action="quiz-answer.php" method="post">
                        <?php

if (isset($_GET['submitQuiz'])){
    $count = 0;
    $result = 0;
   $quiz=$lesson->readQuizAns($_SESSION['id']);
  // $rowCount = $quiz ->rowCount();
    while($quizRow = $quiz->fetch(PDO::FETCH_ASSOC)) {
      $quizId = $quizRow['quizId'];
      $count = $count + 1;
      $question = $quizRow['question'];
      $optionA = $quizRow['optionA'];
       $optionB= $quizRow['optionB'];
       $optionC = $quizRow['optionC'];
       $status = $quizRow['status'];
       $answerValue = $quizRow['answerValue'];

       if($_GET["$quizId"] == $answerValue ) {
           $result = $result + 1;
           $choice = '<span class="text-success text-center">'.$_GET["$quizId"].'</span>';
           $ans = '<span class="text-success text-center ml-4">Correct Choice</span>';
       }else{
         $choice = '<span class="text-danger text-center">'.$_GET["$quizId"].'</span>';
         $ans = '<span class="text-danger text-center ml-4">Wrong Choice</span>';
       }


echo '
  <h5 class="card-title text-primary">RESULTS:'. $result .'/'.$count.'</h5>
<div class="card text-black  mb-2" id="cards_holder_item">
      <div class="card-header"><b>'.$count. ' </b>'.$ans.'</div>
            <div class="card-body">
                <p>'.$question .'</p>
                    <!-- Responds -->
                    <div class="container row">
                        <div class="btn btn-block text-left">
                            <input disabled type="radio" id="'.$optionA.'" name="'.$quizId.'" value="'.$optionA.'" required> '.$optionA.'
                        </div>
                        <div class="btn btn-block text-left">
                            <input disabled type="radio" id="'.$optionB.'" name="'.$quizId.'" value="'.$optionB.'" required> '.$optionB.'
                        </div>
                        <div class="btn btn-block text-left">
                          <input disabled type="radio" id="'.$optionC.'" name="'.$quizId.'" value="'.$optionC.'" required> '.$optionC.'
                        </div>
                        </div>
                        <br>
                        <label>
                        <h5>Your Choice: '.$choice.' </h5>    <h5>Ans: '.$answerValue.' </h5>
                        </label>
                    </div>
                </div>

';
  }

}
else{
    echo"Hmmmmmmmmmmmmmmmmmmmmmmmmmmmm";
}

?>
  </div>
</form>


                </div>
            </div>
        <!-- </div> -->
    </div>
    <?php
// footer
include_once "layout_footer.php";
?>
