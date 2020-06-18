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

$array = $DB->query("SELECT * FROM photo WHERE page='accueil' ORDER BY position");

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
                                        <li><a class="active" href="#">Accueil</a></li>
                                        <li><a href="photos.php">Photos</a></li>                                        
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

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 black_overlay">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-md-9">
                        </div>
                        <div class="col-xl-3 col-md-3">
                            <div class="slider_text text-center slider_custom" style="opacity: 0.5;">
                                <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">Hi, This is Tom, a professional Photographer <br>
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

    <!-- team_area  -->
    <ul id="myGallery" class="gallery_area">
        <?php 
        for ($i=0; $i < count($array); $i++) { 
        ?> 
        <li class="single_photography">
            <img src="<?="img/gallery/" . $array[$i] -> {'file_name'}?>" alt="" loading="lazy">
            <a  href="baby_gallery.html" class="hover ">
                            <div class="hover_inner">
                                <h3>Baby album</h3>
                                <span>Photography / Baby</span>
                            </div>
                        </a>
        </li>
        <?php
        }
        ?>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05588_nb0dma.jpg" alt="XOXO venue in between talks" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05459_ziuomy.jpg" alt="Trees lit by green light during dusk" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05586_oj8jfo.jpg" alt="Portrait of Justin Pervorse" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05465_dtkwef.jpg" alt="Empty bike racks outside a hotel" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05626_ytsf3j.jpg" alt="Heavy rain on an intersection" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05449_l9kukz.jpg" alt="Payam Rajabi eating peanut chicken" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05544_aczrb9.jpg" alt="Portland skyline sunset" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814785/photostream-photos/DSC05447_mvffor.jpg" alt="Interior at Nong's" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05501_yirmq8.jpg" alt="A kimchi hotdog on a plate" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05624_f5b2ud.jpg" alt="Restaurant window with graffiti saying 'water'" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05623_dcpfva.jpg" alt="Portrait of Jeremy Tanner" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05515_d2gzut.jpg" alt="Jordan, Sarah and Sara on red bikes, waiting" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05581_ceocwv.jpg" alt="Barista wearing a hoodie saying 'Coffee Should Be Dope.'" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814784/photostream-photos/DSC05517_ni2k0p.jpg" alt="Payam crossing the street on a bike" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05620_qfwycq.jpg" alt="Lit trees reflected in a puddle" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05462_b33uvp.jpg" alt="Moody chair in my hotel room" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05489_mqzktl.jpg" alt="Tom and Jenn wearing sunglasses" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05476_dlkjza.jpg" alt="Jordan and Sarah in front of a restaurant window" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814783/photostream-photos/DSC05497_abbd3c.jpg" alt="Sarah reading the Double Dragon drink menu" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05487_fcdv7t.jpg" alt="Beer brewing equipment" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05493_q6njbk.jpg" alt="2 cocktails in the making" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05446_xj60ff.jpg" alt="Beverage fridge at Nong's" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05559_hu49zx.jpg" alt="Wood structure reflections" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05482_dtrj02.jpg" alt="Colorful garden equipment in a shop window" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05565_dx5rp6.jpg" alt="Sarah in front of a wooden wall" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05613_o9af2z.jpg" alt="A neon banana" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05469_fdxdzx.jpg" alt="Matt Sacks smiling while we're waiting for food" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814782/photostream-photos/DSC05558_yq2tnz.jpg" alt="A fixed-gear bike under some bright lights" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05483_dyiuya.jpg" alt="Panic's PlayDate being held by a tester" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05468_xzbtcd.jpg" alt="Window reflection of me and Payam" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05457_nloycw.jpg" alt="Upside down shopping carts" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05522_mekpec.jpg" alt="Payam riding a bike with no hands" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05611_lbwtmk.jpg" alt="A kid's pillow left on the bench of a bus stop" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05572_xfvij7.jpg" alt="My reflection in the mirror" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05481_gnljae.jpg" alt="Jordan holding an iced coffee against his head to cool down" loading="lazy">
  </li>
  <li>
    <img src="https://res.cloudinary.com/css-tricks/image/upload/f_auto,q_auto/v1568814781/photostream-photos/DSC05480_zkw8sm.jpg" alt="Jordan and Sarah looking at the menu in a coffee shop" loading="lazy">
  </li>
  <!--  Adding an empty <li> here so the final photo doesn't stretch like crazy. Try removing it and see what happens!  -->
  <li></li>
</ul>

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

    <script src="js/main.js"></script>
</body>

</html>