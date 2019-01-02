<?php    
  global $motive ;
    global $c_logo ;
    global $alt_text ;

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


</head>

<body>
    <div class="text-center">
        <h5 class="motive">
            <?php echo $motive;?>
        </h5>

    </div>

    <nav class="navbar sticky-top navbar-expand-sm  bg-dark navbar-dark">
        <div class="col-10">
            <div class="nav_header">
                <header> <a href="index.php"><img id="logo_1" src="image/logo.jpg" alt="Tuitelage"></a></header>
            </div>
        </div>
        <div class="col-2">
            <div class="row">

                <!-- company logo -->
                <img src="<?php echo $c_logo;?>" id="comp_img" alt="<?php echo $alt_text;?>">
            </div>
        </div>

    </nav>
    <hr class="hrline">
