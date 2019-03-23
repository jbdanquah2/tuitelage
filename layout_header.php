<?php    
  global $motive ;
    global $c_logo;
    global $alt_text;
    global $comp_short_name;
    global $hrline;
    global $page_title;
    global $u_r_l;
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
    

    <style>
        

.card-text {
  font-size: 85%;
}


    }
    @media screen and (max-width:768px){
        #empty-Search{
        width:500px; 
        height:inherit;
    }
    #btn-lesson{
    display:block;
}

    }

   
    @media screen and (max-width:768px){
.card_les{
    height:inherit;
    margin-left:1000px;
}
._image{
    height:50%;
}
.card-text{
    display:none;
}
.card-title{
    margin-top: 0px;
    font-size: 0.8rem;
    margin-bottom: inherit;
    margin-right:1.4rem;
    margin-left:0px;
}
     
        #btn-lesson_{
    display:none;
}
    }

    @media screen and (max-width:988px){
        ._display-col{
            display:none;
        }
        #btn-lesson{
    display:block;
}

    } 

    @media screen and (min-width:1024px){
     #empty-Search{
        width:900px; 
        height:inherit;
    }
    @media screen and (min-width:1006px){
     #empty-Search{
        width:900px; 
        height:inherit;
    }

       


    


    </style>
</head>

<body>
    <?php echo $hrline; ?>
    <div class="mot text-center">
        <h5 class="motive">
            <?php echo $motive;?>
        </h5>
    </div>
    <?php echo $hrline; ?>
    <nav id="navb" class="navbar sticky-top navbar-expand-sm  bg-dark navbar-dark">
        <div id="col" class="col-2">
            <header class="nav_header"> <a href="index.php"><img id="logo_1" class="img-responsive" src="image/logo.jpg" alt="Tuitelage logo"></a></header>
        </div>
        <a href="home.php"><img id="home-icon" src="icon/baseline_home_black_18dp.png" alt=""></a>
        <div id="c_s_n" class="col-9">
            <h5 id="comp_short_name">
                <?php echo $comp_short_name;?>
            </h5>
        </div>
        <div id="div-comp" class="col-2 image_container">
        /* <?php
        if ($_SERVER['PHP_SELF'] != $u_r_l){
echo'
        <div class="centered">
                <button class="btn btn-outline-dark">arrow_down</button>
                </div>'; }
                ?> */
            <div id="_c-2" class="row ">
                <!-- company logo -->
                <img src="<?php echo $c_logo;?>" id="comp_img" class="img-responsive" alt="<?php echo $alt_text;?>">
                               
            </div>
        </div>
    </nav>
