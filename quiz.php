<?php
$hrline ='<hr class="hrline">';
$page_title = "Tuitelage";
$motive = "The best you can be comes from what you read. Let's have some fun studying!";

include_once "layout_header.php";

// include database and object files
include_once 'config/connection.php';
include_once 'objects/lesson.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
$lesson = new lesson($db);
   
  

 
 ?>




<link href="../style/css/tuitlage_css.css" rel="stylesheet" type="text/css" />


<div class="container-fluid">




    <!-- Lesson content -->
    <br>
    <div class="container-fluid">

        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Lesson Content
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
            </ul>
        </div>
    </div><br>



    <div class="container">
        <div class="col-12">

            <div class="row">
                <div>
                    <div class="card" id="cards_holder">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title">Questions</h5>
                            </div>


                            <!-- Lessons -->
                            <div class="card text-black  mb-3" id="cards_holder_item">
                                <div class="card-header"><b>1</b></div>
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru
                                    </p>

                                    <!-- Responds -->
                                    <div class="container row">
                                        <form>
                                            <label>
                                                <h5>Answer:</h5>
                                            </label>
                                            <input type="radio" name="gender" value="Yes" checked> Yes
                                            <input type="radio" name="gender" value="No"> No
                                            <input type="radio" name="gender" value="other"> Other
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <div class="card text-black  mb-3" id="cards_holder_item">
                                <div class="card-header"><b>2</b></div>
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru
                                    </p>

                                    <!-- Responds -->
                                    <div class="container row" style="float: right;">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>
                                                    <h5>Answer:</h5>
                                                </label>
                                                <input type="text" name="responds" placeholder="......">
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <!--End of lessons -->
                            <button type="button" class="btn btn-primary" style="float: right;">Submit <span class="glyphicon"></span> </button>
                        </div>
                    </div>
                </div>


            </div>

        </div>










    </div>
</div>

<?php
// footer
include_once "layout_footer.php";
?>
