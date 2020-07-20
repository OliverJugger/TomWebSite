<?php
require 'db/header.php';
$DB = new DB();
if(!isset($_SESSION)){session_start();}

$array = $DB->query("SELECT * FROM video WHERE page='video' ORDER BY position");

function youtube_image($id) {
    $resolution = array (
        'maxresdefault',
        'sddefault',
        'mqdefault',
        'hqdefault',
        'default'
    );

    for ($x = 0; $x < sizeof($resolution); $x++) {
        $url = '//img.youtube.com/vi/' . $id . '/' . $resolution[$x] . '.jpg';
        if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
            break;
        }
    }
    return $url;
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Halen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="css/photos_style.php" rel="stylesheet" type="text/css" media="all" />

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/styleVideos.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html" style="font-size:1.50em; color: white;">
                                    Tom NL
                                    <!-- <img src="img/logo.png" alt="">-->
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Accueil</a></li>
                                        <li><a href="photos.php">Photos</a></li>                                        
                                        <li><a class="active" href="#">Vidéos</a></li>                                                                              
                                        <li><a href="about.html">collaborations</a></li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>                                                                          
                                        <li><a href="about.html">A propos</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="social_links">
                                <ul>                                    
                                    <li><a class="menu_social_link" href="mailto:tom.haennel57@gmail.com"> <i class="fa fa-envelope"></i> </a></li>
                                    <li><a class="menu_social_link" href="https://www.messenger.com/t/tom.fragment99" target="_blank"> <i class="fab fa-facebook-messenger"></i> </a></li>
                                    <li><a class="menu_social_link" href="https://www.instagram.com/fragment.99" target="_blank"> <i class="fa fa-instagram"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider d-flex align-items-center slider_bg_2 black_overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-md-9">
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="slider_text text-center slider_custom" style="opacity: 0.5;">
                                <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">Hi, This is Tom, a professional Photographer <br>
                                    I Captured Moments</h3>
                               <!-- <div class="video_service_btn wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                                    <a href="#" class="boxed-btn3">Explore Work</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <?php
    for ($i=0; $i < count($array); $i++) {
        if($i%2 == 0){
        ?>

        <div class="wild_photography">
            <div class="container-fluid p-0">
                <div class="row no-gutters align-items-center ">  
                    <div class="col-lg-6">
                        <div class="wildlife_photo my-auto">                        
                            <div class="single-welcome-post bg-img item1 wow fadeInUp" data-wow-delay="300ms">
                                <!-- Play Button -->
                                <a href="<?="https://www.youtube.com/watch?v=" . $array[$i] -> {'video_name'}?>" class="video-play-btn"><i class="fa fa-play"></i></a>
                            </div>
                            <img src="<?="https://img.youtube.com/vi/" . $array[$i] -> {'video_name'} . "/maxresdefault.jpg"?>" alt="" loading="lazy">
                        </div>
                    </div>              
                    <div class="col-lg-6">
                        <div class="section_title">
                            <h2 class="titreVideo"><?=$array[$i] -> {'titre'}?></h3>
                            <p><?=$array[$i] -> {'description'}?></p>
                            <a href="#" class="black_btn">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php // pair
        } 
        if($i%2 == 1){ ?>

        <div class="wild_photography">
            <div class="container-fluid p-0">
                <div class="row no-gutters align-items-center ">                
                    <div class="col-lg-6">
                        <div class="section_title">
                            <h3 class="titreVideo"><?=$array[$i] -> {'titre'}?></h3>
                            <p><?=$array[$i] -> {'description'}?></p>
                            <a href="#" class="black_btn">En savoir plus</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wildlife_photo my-auto">                        
                            <div class="single-welcome-post bg-img item1 wow fadeInUp" data-wow-delay="300ms">
                                <!-- Play Button -->
                                <a href="<?="https://www.youtube.com/watch?v=" . $array[$i] -> {'video_name'}?>" class="video-play-btn"><i class="fa fa-play"></i></a>
                            </div>
                            <img src="<?="https://img.youtube.com/vi/" . $array[$i] -> {'video_name'} . "/maxresdefault.jpg"?>" alt="" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php //impair
        }
    }
    ?>

    <div class="contact_info_area border_bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                    <div class="cotact_info">
                        <div class="section_title">
                                <h3>Me Contacter</h3>
                                <p>Vous pouvez me contacter sur les réseaux sociaux ou par mail :</p>
                                <br/>   
                                <div class="socail_links contact_social_links">
                                    <ul id="contactIcons">
                                        <li>
                                            <a href="mailto:tom.haennel57@gmail.com">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.messenger.com/t/tom.fragment99" target="_blank">
                                                <i class="fab fa-facebook-messenger"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/fragment.99" target="_blank">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

     <!-- footer start -->
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <p class="copy_right ">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="#"> Tom NL </a> Official Website | Made By <a href="https://github.com/OliverJugger?tab=repositories"> Olivier M </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>                    
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>


    <!-- video js -->
    <script src="js/plugins_video.js"></script>
    <script src="js/active.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>