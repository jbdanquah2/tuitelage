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
        <?php echo $_SESSION['user']. $at . $comp_name;?>&nbsp;</small><a href="logout.php?logout"><img src="icon/baseline-exit_to_app-24px.svg" alt="">Log Out!</a>
    <a href="upload-lesson.php" style="float:right;">Upload Lesson</a></p>
<div class="container-fluid">

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Lesson Content
        </button>
    </div>
</div><br>

<div class="container">
    <div class="col-8 offset-2">
        <div class="row">
            <div class="card" id="cards_holder">
                <div class="card-body">
                    <div>
                        <h5 class="card-title">Questions</h5>
                    </div>
                    <?php 
if (isset($_GET['getQuiz'])){
    $_SESSION['id'] = $_GET['getQuiz'];
   $quiz=$lesson->readLessonQuiz($_SESSION['id']);                while($quizRow = $quiz->fetch(PDO::FETCH_ASSOC)) {       
      $quizId = $quizRow['quizId'];
      $question = $quizRow['question'];
      $optionA = $quizRow['optionA'];
       $optionB= $quizRow['optionB'];
       $optionC = $quizRow['optionC'];
       $status = $quizRow['status'];
echo '     

<div class="card text-black  mb-3" id="cards_holder_item">
                <form>
                                <div class="card-header"><b>'.$quizId.'</b></div>
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
?>
                    <button type="button" class="btn btn-primary">Submit <span class="glyphicon"></span> </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// footer
include_once "layout_footer.php";
?>
