<?php
// set page headers
$page_title = "Tuitelage";
include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

 
// pass connection to objects
$lesson = new lesson($db);
 
 ?>


<!--    <div class="container">-->
<div class="row" id="home">
    <div class="col-sm-9 col-md-7 col-lg-5 " id="sidiv">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h3 class="card-title text-center">Login</h3>
                <form class="form-signin">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus></div>
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-lg btn-default bg-dark btn-block text-uppercase" type="submit">Sign in</button>
                    <hr class="my-4">
                    <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                </form>
                <div class="notic text-center"> <a class="" href="#">
                        or are you a company? create account here!
                    </a></div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<hr>
<div class="row">
    <div class="col-sm-12 t-material text-center">
        <div class="card">
            <div class="card-body t-body">
                <h4 class="card-title">Sign in above or explore lessons below</h4>
                <form class="form-inline home-search">
                    <input class="form-control" type="text" placeholder="Search favorite lesson">
                    <button class="btn btn-success-outline bg-dark" type="submit">Search </button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="container">
    <?php
    $stmt = $lesson->read();
    while ($row_lesson = $stmt -> fetch(PDO::FETCH_ASSOC)){
        extract($row_lesson);
        $lessonName = $row_lesson['lessonName'];
        $lessonSummary = $row_lesson['lessonSummary'];
        
     echo  "<div class='row'>";
  echo '<div class="col-sm-6 t-material">';
        echo '<div class="card">';
            echo '<div class="card-body t-body">';
                echo '<h5 class="card-title">$lessonName</h5>';
               echo '<p class="card-text">{$lessonSummary}</p> <a href="#" class="btn btn-danger">View Lesson</a>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

   echo '</div>';
    }
?>
    <div class="row">
        <div class="col-sm-12 text-center">
            <a class="readmore" href="#"><button class="btn btn-dark"> See more lessons</button></a>
        </div>
    </div>

</div>

<hr>
<div class="row">
    <div class="col-sm-12 t-material text-center">
        <div class="card bg-secondary t-quiz">
            <div class="card-body t-body">
                <h3 class="card-title">Believe you know enough? take a quiz here</h3>
                <a href="#" class="btn btn-primary">Take a Quiz</a>
                <p class="card-text q-text">A quiz is a good way to try yourself of to see how much you already know. <br />
                    <a href="#">Choose a topic to take a quiz</a></p>

            </div>
        </div>
    </div>
</div>

<hr>
<div class="container">

    <div id="testimony_indicator" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#testimony_indicator" data-slide-to="0" class="active"></li>
            <li data-target="#testimony_indicator" data-slide-to="1"></li>
            <li data-target="#testimony_indicator" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="image/apple_background.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5> lorem Ipsum </h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde minima voluptates impedit, alias sequi labore quod mollitia deserunt aliquam laborum. Ex porro accusamus placeat deserunt, quia minima, natus eum eveniet.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="image/back-home.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block text-danger">
                    <h5>Back Home</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque non, doloribus maiores, aspernatur voluptate magni quod deserunt! Quam exercitationem quia necessitatibus repudiandae similique perferendis rerum, officia iure error doloremque alias!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="image/back2.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>The best place to be</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus iusto omnis, expedita ut eos, aut incidunt dicta, quisquam provident distinctio fuga at ea est minima iste, blanditiis eum commodi ducimus.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#testimony_indicator" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#testimony_indicator" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<?php
// footer
include_once "layout_footer.php";
?>
