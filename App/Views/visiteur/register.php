
<?php 
session_start(); 
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : [];
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : [];
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home  || Udemey </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="../assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Crsine HTML Template For Car Services" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="../assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="../assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="../assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="../assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="../assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="../assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="../assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="../assets/vendors/icomoon-icons/style.css">
    <link rel="stylesheet" href="../assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="../assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="../assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="../assets/vendors/twentytwenty/twentytwenty.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="../assets/css/zilom.css" />
    <link rel="stylesheet" href="../assets/css/zilom-responsive.css" />
    <style>
             
.logout {
    position: relative;
    display: inline-block;
    vertical-align: middle;
    -webkit-appearance: none;
    border: none;
    outline: none !important;
    background-color: red;
    color: #ffffff;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 10px 20px 10px;
    border-radius: 8px;
    transition: all 0.3s linear;
    overflow: hidden;
    letter-spacing: 0.1em;
    z-index: 1;
}
.logout:after {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: var(--thm-black);
    transition-delay: .1s;
    transition-timing-function: ease-in-out;
    transition-duration: .5s;
    transition-property: all;
    opacity: 1;
    transform-origin: top;
    transform-style: preserve-3d;
    transform: scaleY(0);
    z-index: -1;
}

.logout:hover:after {
    opacity: 1;
    transform: scaleY(1.0);
}

.logout:hover {
    color: #ffffff;
}
    </style>
</head>

<body>

    <div class="preloader">
        <img class="preloader__image" width="60" src="../assets/images/loader.png" alt="" />
    </div>

    <!-- /.preloader -->
    <div class="page-wrapper">

        <header class="main-header main-header--one  clearfix">
            <div class="main-header--one__top clearfix">
                <div class="container">
                    <div class="main-header--one__top-inner clearfix">
                        <div class="main-header--one__top-left">
                            <div class="main-header--one__top-logo">
                                <a href="../index.php"><img src="../assets/images/resources/logo-1.png" alt="" /></a>
                            </div>
                        </div>

                        <div class="main-header--one__top-right clearfix">
                            <ul class="main-header--one__top-social-link list-unstyled clearfix">
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>

                            <div class="main-header--one__top-contact-info clearfix">
                                <ul class="main-header--one__top-contact-info-list list-unstyled">
                                    <li class="main-header--one__top-contact-info-list-item">
                                        <div class="icon">
                                            <span class="icon-phone-call-1"></span>
                                        </div>
                                        <div class="text">
                                            <h6>Call Agent</h6>
                                            <p><a href="tel:123456789">+212 651928482</a></p>
                                        </div>
                                    </li>
                                    <li class="main-header--one__top-contact-info-list-item">
                                        <div class="icon">
                                            <span class="icon-message"></span>
                                        </div>
                                        <div class="text">
                                            <h6>Call Agent</h6>
                                            <p><a href="mailto:info@templatepath.com">charafeddinetbibzat@gmail.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="main-header-one__bottom clearfix">
                <div class="container">
                    <div class="main-header-one__bottom-inner clearfix">
                        <nav class="main-menu main-menu--1">
                            <div class="main-menu__inner">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>

                                <div class="left">
                                    <ul class="main-menu__list">
                                        <li >
                                            <a href="../index.php">Home</a>
                                        </li>
                                        <li><a href="about.php">About</a></li>
                                        <li class="dropdown">
                                            <a href="courses.php">Courses</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="teachers-1.php"> Teachers</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="news.php">News</a>
                                        </li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </div>

                                <div class="right">
                                    <div class="main-menu__right">
                                        <div class="main-menu__right-login-register">
                                        <?php 
                                                                            
                                            if(!isset($_SESSION['id_user'])){
                                            ?>
                                            <ul class="list-unstyled">
                                                <li><a href="./login.php">Login</a></li>
                                                <li><a class="dropdown current" href="./register.php">Register</a></li>
                                            </ul>
                                            <?php }else { 

                                            ?>
                                                <div class="b-flex justify-content-end flex ">
                                               
                                                <div>
                                                    <form action="../logout.php" method="POST">
                                                    <span><?php if(isset ($_SESSION['user']))
                                                {echo $_SESSION['fullname'];}?></span>
                                                        <button type="submit" name="submit" class="logout ">Logout</button>
                                                    </form>
                                                </div>
                                                    
                                            </div>
                                            <?php }
                                            ?>
                                           
                                        </div>
                                        <div class="main-menu__right-cart-search">
                                            <div class="main-menu__right-cart-box">
                                                <a href="#"><span class="icon-shopping-cart"></span></a>
                                            </div>
                                            <div class="main-menu__right-search-box">
                                                <a href="#" class="thm-btn search-toggler">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </nav>

                    </div>
                </div>
            </div>

        </header>


        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content">

            </div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->



        <!--Registration One Start-->
        <section class="registration-one jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%">
            <div class="registration-one__bg"
                style="background-image: url(../assets/images/resources/registration-one-bg.jpg);"></div>
            <div class="container">
                <div class="row">
                    <!--Start Registration One Left-->
                    <div class="col-xl-7 col-lg-7">
                        <div class="registration-one__left">
                            <div class="section-title">
                                <span class="section-title__tagline">Get Free Registration</span>
                                <h2 class="section-title__title">Register your Account<br> Get free Access to <span
                                        class="odometer" data-count="66000">00</span> <br>Online Courses</h2>
                            </div>
                            <p class="registration-one__left-text">There are many variations of passages of lorem ipsum
                                available but the majority have suffered alteration in some form.</p>
                            <div class="registration-one__left-transform-box">
                                <div class="registration-one__left-transform-box-icon">
                                    <span class="icon-online-course"></span>
                                </div>
                                <div class="registration-one__left-transform-box-text">
                                    <h3><a href="#">Transform Access To Education</a></h3>
                                    <p>Discover creative projects limited editions of 100 <br>from artists, designers,
                                        and more.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Registration One Left-->

                    <!--Start Registration One Right-->
                    <div class="col-xl-5 col-lg-5">
                        <div class="registration-one__right wow slideInRight" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="registration-one__right-form">
                                <div class="title-box">
                                    <h4>Fill your Registration</h4>
                                </div>
                                <div class="form-box">
                                <?php if (!empty($error_message)): ?>
                                    <div class="bg-red-500 text-black p-4 rounded">
                                    <?php foreach ($error_message as $error): ?>
                                        <p><?php echo htmlspecialchars($error); ?></p>
                                    <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                    <form method="post" action="register_logic.php">
                                        <div class="form-group">
                                            <input type="text" name="nom" placeholder=" First Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="prenom" placeholder=" Last Name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email Address" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" placeholder="********" required="" >
                                        </div>
                                        <div class="form-group">
                                            <label for="role" class="block font-semibold mb-3 text-lg text-gray-800">
                                                Select Your Role:
                                            </label>
                                            <div class="flex items-center gap-6">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" name="role" value="Etudiant" required
                                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 rounded-full">
                                                    <span class="text-gray-700 text-sm font-medium">Student (Étudiant)</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" name="role" value="Enseignant"
                                                        class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2 rounded-full">
                                                    <span class="text-gray-700 text-sm font-medium">Teacher (Enseignant)</span>
                                                </label>
                                            </div>
                                        </div>

                                        <button class="registration-one__right-form-btn" type="submit"
                                            name="submitregister">
                                            <span class="thm-btn">apply for it</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Registration One Right-->
                </div>
            </div>
        </section>
        <!--Registration One End-->



        <!--Start Newsletter One-->
        <section class="newsletter-one">
            <div class="container">
                <div class="row">
                    <!--Start Newsletter One Left-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="newsletter-one__left">
                            <div class="section-title">
                                <h2 class="section-title__title">Subscribe to Our <br>Newsletter to Get Daily
                                    <br>Content!</h2>
                            </div>
                        </div>
                    </div>
                    <!--End Newsletter One Left-->

                    <!--Start Newsletter One Right-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="newsletter-one__right">
                            <div class="shape1 zoom-fade"><img src="../assets/images/shapes/thm-shape2.png" alt="" /></div>
                            <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                                    src="../assets/images/shapes/thm-shape3.png" alt="" /></div>
                            <div class="newsletter-form wow slideInDown" data-wow-delay="100ms"
                                data-wow-duration="1500ms">
                                <form action="#">
                                    <input type="text" name="email" placeholder="Enter your email">
                                    <button type="submit"><span class="icon-paper-plane"></span></button>
                                </form>
                                <div class="newsletter-one__right-checkbox">
                                    <input type="checkbox" name="agree " id="agree" checked>
                                    <label for="agree"><span></span>I agree to all terms and policies of the
                                        company</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Newsletter One Right-->
                </div>
            </div>
        </section>
        <!--End Newsletter One-->

        <!--Start Footer One-->
        <footer class="footer-one">
            <div class="footer-one__bg" style="background-image: url(../assets/images/backgrounds/footer.jpg);">
            </div><!-- /.footer-one__bg -->
            <div class="footer-one__top">
                <div class="container">
                    <div class="row">
                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="../index.php"><img src="../assets/images/resources/footer-logo.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.3s">
                            <div class="footer-widget__column footer-widget__courses">
                                <h3 class="footer-widget__title">Courses</h3>
                                <ul class="footer-widget__courses-list list-unstyled">
                                    <li><a href="#">UI/UX Design</a></li>
                                    <li><a href="#">WordPress Development</a></li>
                                    <li><a href="#">Business Strategy</a></li>
                                    <li><a href="#">Software Development</a></li>
                                    <li><a href="#">Business English</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.5s">
                            <div class="footer-widget__column footer-widget__links">
                                <h3 class="footer-widget__title">Links</h3>
                                <ul class="footer-widget__links-list list-unstyled">
                                    <li><a href="./visiteur/about.php">About Us</a></li>
                                    <li><a href="#">Overview</a></li>
                                    <li><a href="./visiteur/teachers-1.php">Teachers</a></li>
                                    <li><a href="#">Join Us</a></li>
                                    <li><a href="./visiteur/news.php">Our News</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.7s">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title">Contact</h3>
                                <p class="text">88 broklyn street, New York USA</p>
                                <p><a href="mailto:info@templatepath.com">needhelp@company.com</a></p>
                                <p class="phone"><a href="tel:123456789">92 888 666 0000</a></p>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                        <!--Start Footer Widget Column-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow animated fadeInUp" data-wow-delay="0.9s">
                            <div class="footer-widget__column footer-widget__social-links">
                                <ul class="footer-widget__social-links-list list-unstyled clearfix">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Footer Widget Column-->

                    </div>
                </div>
            </div>

            <!--Start Footer One Bottom-->
            <div class="footer-one__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer-one__bottom-inner">
                                <div class="footer-one__bottom-text text-center">
                                    <p>&copy; Copyright 2021 by Layerdrops.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Footer One Bottom-->
        </footer>
        <!--End Footer One-->

    </div><!-- /.page-wrapper -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="../index.php" aria-label="logo image"><img src="../assets/images/resources/mobilemenu_logo.png"
                        width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="icon-phone-call"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@zilom.com</a>
                </li>
                <li>
                    <i class="icon-letter"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->



    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn2">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->



    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="../assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="../assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="../assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="../assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="../assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="../assets/vendors/odometer/odometer.min.js"></script>
    <script src="../assets/vendors/swiper/swiper.min.js"></script>
    <script src="../assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="../assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="../assets/vendors/wow/wow.js"></script>
    <script src="../assets/vendors/isotope/isotope.js"></script>
    <script src="../assets/vendors/countdown/countdown.min.js"></script>
    <script src="../assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendors/twentytwenty/twentytwenty.js"></script>
    <script src="../assets/vendors/twentytwenty/jquery.event.move.js"></script>
    <script src="../assets/vendors/parallax/parallax.min.js"></script>


    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

    <!-- template js -->
    <script src="../assets/js/zilom.js"></script>


</body>

</html>