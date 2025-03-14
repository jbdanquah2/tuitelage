<?php
  global $motive ;
    global $c_logo;
    global $alt_text;
    global $comp_short_name;
    global $hrline;
    global $page_title;
    global $u_r_l;
    global $menu;
    $u_r_l=$_SERVER['REQUEST_URI'];

?>
    <!doctype html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
        <title>
            <?php echo $page_title;?>
        </title>
        <link href="image/favicon.ico" rel="shortcut icon" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="style/landing.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="style/lessonContent.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="style/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="style/tuitelage_css.css">
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
        <!-- <link rel="stylesheet" type="text/css" href="Style/materialize.min.css"> -->

    <body>
        <?php echo $hrline; ?>
            <div class="mot text-center">
                <h5 class="motive">
            <?php echo $motive;?>
        </h5> </div>
            <?php echo $hrline; ?>
                <nav id="navb" class="navbar sticky-top navbar-expand-sm  bg-dark navbar-dark">
                    <div id="col" class="col-lg-6 col-3">
                        <header class="nav_header">
                            <a href="index.php"><img id="logo_1" class="img-responsive" src="image/logo.jpg" alt="Tuitelage logo"></a>
                        </header>
                    </div>
                    <a  href="home.php"><img id="home-icon" src="icon/baseline_home_black_18dp.png" alt=""></a>
                      <div id="c_s_n" class="col-lg-3 offset-lg-2 col-6">
                        <h5 onmouseover="drag_menu()" id="comp_short_name">
                            <?php echo $comp_short_name;?>
                        </h5>
                      </div>
                    <div id="div-comp" class="col-lg-3 offset-lg-1 col-3 image_container">
                        <div id="_c-2" class="row image_container ">
                            <!-- company logo / avatar -->
                            <div onmouseover="drag_menu()" onclick="drag_menu()"><img src="<?php echo $c_logo; ?>" id="comp_img" class="img-responsive" alt="<?php echo $alt_text;?>"> </div>
                            <?php
                   if(isset($_SESSION['user'])){
                       echo'
                              <div class="centered" id="drag_menu" >
                                  <button class="btn btn-outline-light btn-lg" id="drag_btn" onclick="drag_menu()">
                                  ☰

                              </div>
                       ';
                   }
                   ?> </div>
                 </div>
                 </nav>
                <?php include "menu.php" ?>
