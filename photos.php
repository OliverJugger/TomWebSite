<?php
require 'db/header.php';
$DB = new DB();
if (isset($_SESSION) ) {
    session_destroy();
    session_start();
}
else{
session_start();
}

$albums = $DB->query("SELECT DISTINCT id FROM album");

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tom NL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link href="css/photos_style.php" rel="stylesheet" type="text/css" media="all" />
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
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
                                        <li><a class="active" href="#">Photos</a></li>                                        
                                        <li><a href="videos.php">Vidéos</a></li>                                                                              
                                        <li><a href="about.html">collaborations</a></li>
                                        <li><a href="#">autres</a>
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

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1 black_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Albums Photo</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        for ($i=0; $i < count($albums); $i++) {
			$photos = $DB->query("SELECT * FROM photo WHERE album ='" . $albums[$i] -> {'id'} . "'");
    ?> 
 	<div id="NewsCarousel<?=$i?>" class="carousel slide default-div-top-padding" data-ride="carousel" style="height:500px">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#NewsCarousel<?=$i?>" data-slide-to="0" class="active"></li>
                        <?php for ($j=1; $j < count($photos); $j++) { ?>
                            <li data-target="#NewsCarousel<?=$i?>" data-slide-to="<?=$j?>"></li>
                    	<?php } ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">

                        <div class="carousel-item active" >
                            <img src="<?="img/gallery/albums/" . $photos[0] -> {'file_name'}?>" alt="imgAlt">
                            <div class="carousel-caption">
                                <a href="#"><h3 class="carrousselImageDescription"><?=$photos[0] -> {'titre'}?></h3></a>
                                <p class="carrousselImageDescription"><?=$photos[0] -> {'description'}?></p>
                            </div>
                        </div>

                        <?php for ($k=1; $k < count($photos); $k++) { ?>

                        <div class="carousel-item">
                            <img src="<?="img/gallery/albums/" . $photos[$k] -> {'file_name'}?>" alt="imgAlt">
                            <div class="carousel-caption">
                                <a href="#"><h3 class="carrousselImageDescription"><?=$photos[$k] -> {'titre'}?></h3></a>
                                <p class="carrousselImageDescription"><?=$photos[$k] -> {'description'}?></p>
                            </div>
                        </div>

                        <?php } ?>

                    </div>


                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#NewsCarousel<?=$i?>" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#NewsCarousel<?=$i?>" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

        </div>

        <?php } ?>


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

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

   <!--<script src="js/main.js"></script> -->

    <script type="text/javascript">
    // TOP Menu Sticky
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
        $("#sticky-header").removeClass("sticky");
        $('#back-top').fadeIn(500);
        } else {
        $("#sticky-header").addClass("sticky");
        $('#back-top').fadeIn(500);
        }
    });

    $(document).ready(function () {


        $('.carousel-caption').hide();

        $('img[alt = imgAlt').hover(function () {
            $('.carousel-caption').fadeIn( 500 );
        });
    });

</script>
</body>

</html>