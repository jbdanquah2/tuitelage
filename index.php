<?php
ob_start();
session_start();
$hrline ='<hr class="hrline">';
$page_title = "Tuitelage.com";
$motive = 'Want the best place to start your self development quest? Start here!  <form method="post"  action="index.php" class="form-inline home-search">
						<input name="searchForm" class="form-control" type="text" placeholder="Search favorite lesson" required>
						<button class="btn btn-success-outline bg-dark sbtn" type="submit" name="search">Search</button>
				</form>';

include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
include_once 'objects/appUser.php';


// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);
$appUser = new appUser($db);

if (isset($_SESSION['user']) != "") {
header("Location: home.php");
}

 ?>
    <div class="container-fluid col-12 _wrapper">
        <!--    <div class="container">-->
        <div class="container-fluid wrap">
            <div class="row" id="home-login">
                <div id="colu" class="col-lg-3 ">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">Login</h3>
                            <form method="post" class="form-signin">
                                <?php
if (isset($_POST['signin_btn'])) {

$userName = $_POST['userName'];
$pssword = $_POST['pssword'];
$status = 'Active';


$row = $appUser->getUser($userName);

if ($row['pssword'] == $pssword) {
    try {
		$userStatus = $row['userStatus'] ;
		if ($userStatus == $status) {
$_SESSION['userType'] = $row['userType'];
$_SESSION['userName'] = explode("@","$userName")[0];
$_SESSION['user'] = $row['firstName'];
$_SESSION['userCompany'] = $row['companyName'];
$_SESSION['companyShortName'] = $row['companyShortName'];
$_SESSION['companyId'] = $row['companyId'];
            if($_SESSION['companyId'] ==  26){
           $_SESSION['companyLogo'] = $row['avatar'];
            }else{
            $_SESSION['companyLogo'] = $row['companyLogo'];
            }
				header("Location:home.php");
				}else {
				echo ("<center id='response' class='text-danger'>User not active</center>");
		}
 }catch (PDOException $ex) {
   echo "";
    }
} else {
echo("<center id='response' class='text-danger'>Wrong Credentials. Please check & try again!</center>");
}

}
?>
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="userName" class="form-control" placeholder="Email address" required> </div>
                                    <div class="form-label-group">
                                        <input type="password" name="pssword" id="inputPassword" class="form-control" placeholder="Password" required> </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="_link custom-control-input " id="customCheck1">
                                        <label class="custom-control-label _link" for="customCheck1">Remember password</label>
                                    </div>
                                    <button name="signin_btn" class="btn btn-lg btn-default bg-dark btn-block text-uppercase" type="submit">Sign in</button>
                            </form>
                            <div class="text-center"> <a class="_link" href="signup.php">
                                create company account here!
                            </a> <a class="_link" href="signup-2.php">or sign up here to explore</a> </div>
                        </div>
                    </div>
                </div>
                <div id="_display-col" class="col-lg-9 text-center">
                    <h4 class="text-center" id="_display">
                    <img src="icon/baseline_devices_other_black_48dp.png" alt="">
                    Wisdom => <br> the application of knowledge!</h4> </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12 t-material text-center">
                    <div class="card">
                        <div class="card-body t-body">
                            <h4 class="card-title">Sign in above or explore lessons below</h4>
                            <form method="post" class="form-inline home-search" name="search_2">
                                <input name="searchForm" class="form-control" type="text" placeholder="Search favorite lesson" required>
                                <button name="search" class="btn btn-success-outline bg-dark" type="submit">Search </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid col-12  lesson-wrap ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 row_card_hor">
                        <?php
if (!isset($_POST['search'])) {
$stmt=$lesson->readCompanyLesson(26);
while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {

$lessonId = $rows['lessonId'];
$lessonName = $rows['lessonName'];
$lessonSummary = $rows['lessonSummary'];
$descriptiveImage = $rows['descriptiveImage'];

echo

                        '<div class="card_les  t-material mt-3" id="lesson_t">
                        <img class="card-img _image img-responsive" src="image/'. $descriptiveImage .'" width=700 height=200 alt="Card image">
                            <div class="card-body t-body">

                                <div class="car-img-overlay">
                                    <h5 class="card-title text-center">'.
                                    $lessonName.'
                                    </h5>
                                </div>
                                <p class="card-text text-justify">'.
                    $lesson->truncate($lessonSummary, 108) .'
                                    </p>

                 <form action="lessonContent.php" method="GET">
                 <div class="row">
                    <a class="btn btn-danger card-link" href="lessonContent.php?lessonId='.$lessonId.'">
                    View <span #="btn-lessons_"> Lesson!</span></a></div>
                    </form>

                 </div>

            </div>'
            ;
}
}else{
    $searchForm = $_POST['searchForm'];
   $stmt=$lesson->searchForQueryString($searchForm,26);
}
?> </div>
                </div>
                <!-- <div class="row">
                <div class="col-sm-12 text-center">
                    <a class="readmore" href="#">
                        <button class="btn btn-dark"> See more lessons</button>
                    </a>
                </div>
            </div> --></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 t-material text-center">
                <div class="card bg-secondary t-quiz">
                    <div class="card-body t-body">
                        <h3 class="card-title">Believe you know enough? take a quiz here</h3> <a href="#" class="btn btn-primary">Take a Quiz</a>
                        <p class="card-text q-text">A quiz is a good way to try yourself of to see how much you already know.
                            <br /> <a class="choose" href="#">Choose a topic to take a quiz</a></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="caro_back_ground">
            <div class="container ">
                <div id="testimony_indicator" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#testimony_indicator" data-slide-to="0" class="active"></li>
                        <li data-target="#testimony_indicator" data-slide-to="1"></li>
                        <li data-target="#testimony_indicator" data-slide-to="2"></li>
                        <li data-target="#testimony_indicator" data-slide-to="3"></li>
                        <li data-target="#testimony_indicator" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active"> <img class="d-block w-100" src="image/apple_background.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5> lorem Ipsum </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde minima voluptates impedit, alias sequi labore quod mollitia deserunt aliquam laborum. Ex porro accusamus placeat deserunt, quia minima, natus eum eveniet.</p>
                            </div>
                        </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="image/back-home.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block text-danger">
                                <h5>Back Home</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque non, doloribus maiores, aspernatur voluptate magni quod deserunt! Quam exercitationem quia necessitatibus repudiandae similique perferendis rerum, officia iure error doloremque alias!</p>
                            </div>
                        </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="image/back2.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>The best place to be</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus iusto omnis, expedita ut eos, aut incidunt dicta, quisquam provident distinctio fuga at ea est minima iste, blanditiis eum commodi ducimus.</p>
                            </div>
                        </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="image/back5.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>The best place to be</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus iusto omnis, expedita ut eos, aut incidunt dicta, quisquam provident distinctio fuga at ea est minima iste, blanditiis eum commodi ducimus.</p>
                            </div>
                        </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="image/back3.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>The best place to be</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus iusto omnis, expedita ut eos, aut incidunt dicta, quisquam provident distinctio fuga at ea est minima iste, blanditiis eum commodi ducimus.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#testimony_indicator" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                    <a class="carousel-control-next" href="#testimony_indicator" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?php
// footer
include_once "layout_footer.php";
?>
