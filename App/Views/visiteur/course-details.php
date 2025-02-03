<?php
require_once '../autoload.php';
use Classes\Cours;
session_start();
$courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($courseId <= 0) {
    echo "Invalid course ID.";
    exit;
}

$courseItem = Cours::getCoursById($courseId);

if (!$courseItem) {
    echo "Course not found.";
    exit;
}
$instructorName = htmlspecialchars($courseItem['enseignant_nom']);
$categoryName = htmlspecialchars($courseItem['categorie_nom']);

$cours=Cours::ShowCours();
$courses = array_slice($cours, 0, 4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Course Details || Udemey</title>
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
    <link rel="stylesheet" href="../assets/vendors/animate/animate.min.css"/>
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
                                <a href="../index.php"><img src="../assets/images/resources/logo-1.png" alt=""/></a>
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
                                            <p><a href="tel:0651928482">+212 651928482</a></p>
                                        </div>
                                    </li>
                                    <li class="main-header--one__top-contact-info-list-item">
                                        <div class="icon">
                                            <span class="icon-message"></span>
                                        </div>
                                        <div class="text">
                                            <h6>Call Agent</h6>
                                            <p><a href="mailto:charafeddinetbibzat@gmail.com">charafeddinetbibzat@gmail.com</a></p>
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
                                        <li class="dropdown">
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
                                                <li><a href="./register.php">Register</a></li>
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



    <!--Page Header Start-->
    <section class="page-header clearfix" style="background-image: url(../assets/images/backgrounds/about1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Course Details</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="../index.php">Home</a></li>
                                <li class="active">Course Details</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Start Course Details-->
    <section class="course-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="course-details__content  <?= htmlspecialchars($courseItem['type']) ?>">
             
<div class="courses-one__single style2 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
    <div class="courses-one__single-img">
        <?php
         $imageSrc = ($courseItem['type'] === 'text') 
         ? '../assets/images/backgrounds/text.webp' 
         : '../assets/images/backgrounds/video.webp';
     ?>
     <img src="<?= htmlspecialchars($imageSrc) ?>" alt="Course Image"/>
       <div class="overlay-text">
            <p><?= htmlspecialchars($courseItem['type']) ?></p>
        </div>
    </div>
    <div class="courses-one__single-content">
        <div class="courses-one__single-content-overlay-img">
            <img src="../assets/images/resources/course-details-overlay-img.png" alt=""/>
        </div>
        <h6 class="courses-one__single-content-name">
            <?= $instructorName  ?> 
            <span>Updated <?= htmlspecialchars($courseItem['date_creation']) ?></span>
        </h6>
        <h4 class="courses-one__single-content-title">
            <a href="course-details.php?id=<?= htmlspecialchars($courseItem['idCours']) ?>">
                <?= htmlspecialchars($courseItem['titre']) ?>
            </a>
        </h4>
       
        <div class="course-details__content-text1">
            <p><?= htmlspecialchars($courseItem['description']) ?></p>
        </div>

        <?php if (!empty($courseItem['tags'])): ?>
                            <div class="course-tags">
                                <strong>Tags: </strong>
                                <?= htmlspecialchars($courseItem['tags']) ?>
                            </div>
        <?php endif; ?>

       
    </div>
</div>

                        <!--End Single Courses One-->

                        <!--End Course Details Curriculum-->

                        <!--Start Course Details Reviews-->
                        <div class="course-details__reviews">
                            <h3 class="course-details__reviews-title">Reviews</h3>
                            <div class="course-details__progress-review">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-7 col-md-7">
                                        <div class="course-details__progress clearfix">
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Excellent</p>
                                                <div class="course-details__progress-bar">
                                                    <span style="width: 90%;"></span>
                                                </div>
                                                <p class="course-details__progress-count">2</p>
                                            </div>

                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Very Good</p>
                                                <div class="course-details__progress-bar">
                                                    <span style="width: 80%;"></span>
                                                </div>
                                                <p class="course-details__progress-count">1</p>
                                            </div>

                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Average</p>
                                                <div class="course-details__progress-bar">
                                                    <span style="width: 70%;"></span>
                                                </div>
                                                <p class="course-details__progress-count">1</p>
                                            </div>

                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Poor</p>
                                                <div class="course-details__progress-bar">
                                                    <span style="width: 0%;" class="no-bubble"></span>
                                                </div>
                                                <p class="course-details__progress-count">0</p>
                                            </div>

                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Terrible</p>
                                                <div class="course-details__progress-bar">
                                                    <span style="width: 0%;" class="no-bubble"></span>
                                                </div>
                                                <p class="course-details__progress-count">0</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="course-details__review-box">
                                            <h2 class="course-details__review-count">4.6</h2>
                                            <div class="course-details__review-stars">
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                            </div>
                                            <p class="course-details__review-text">30 reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Start Course Details Comment-->
                            <div class="course-details__comment">
                                <div class="course-details__comment-single">
                                    <div class="course-details__comment-img">
                                        <img src="../assets/images/resources/course-details-comment-img1.png" alt=""/>
                                    </div>
                                    <div class="course-details__comment-text">
                                        <div class="course-details__comment-text-top">
                                            <h3 class="course-details__comment-text-name">David Marks</h3>
                                            <p>3 hours ago</p>
                                            <div class="course-details__comment-review-stars">
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                            </div>
                                        </div>
                                        <p class="course-details__comment-text-bottom">Cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum lightly believable. If you are going to use a of you need to be sure there.</p>
                                    </div>
                                </div>

                                <div class="course-details__comment-single">
                                    <div class="course-details__comment-img">
                                        <img src="../assets/images/resources/course-details-comment-img2.png" alt=""/>
                                    </div>
                                    <div class="course-details__comment-text">
                                        <div class="course-details__comment-text-top">
                                            <h3 class="course-details__comment-text-name">Christine Eve</h3>
                                            <p>3 hours ago</p>
                                            <div class="course-details__comment-review-stars">
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                            </div>
                                        </div>
                                        <p class="course-details__comment-text-bottom">Cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum lightly believable. If you are going to use a of you need to be sure there.</p>
                                    </div>
                                </div>
                            </div>
                            <!--End Course Details Comment-->

                            <div class="course-details__add-review">
                                <h2 class="course-details__add-review-title">Add a Review</h2>
                                <p class="course-details__add-review-text">
                                    Rate this Course?
                                    <a href="#" class="fas fa-star active pd-left"></a>
                                    <a href="#" class="fas fa-star active"></a>
                                    <a href="#" class="fas fa-star active"></a>
                                    <a href="#" class="fas fa-star"></a>
                                    <a href="#" class="fas fa-star"></a>
                                </p>

                                <div class="course-details__add-review-form">
                                    <form action="../assets/inc/sendemail.php" class="comment-one__form contact-form-validated" novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="comment-form__input-box">
                                                    <input type="text" placeholder="Your name" name="name">
                                                </div>
                                                <div class="comment-form__input-box">
                                                    <input type="email" placeholder="Email address" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="comment-form__input-box">
                                                    <textarea name="message" placeholder="Write message"></textarea>
                                                </div>
                                                <button type="submit" class="thm-btn comment-form__btn">Submit review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End Course Details Reviews-->
                    </div>
                </div>
                <!--End Course Details Content-->

                <!--Start Course Details Sidebar-->
                <div class="col-xl-4 col-lg-4">
                    <div class="course-details__sidebar">
                        <div class="course-details__price wow fadeInUp animated" data-wow-delay="0.1s">
                        <div class="courses-one__single-content-price"></div>

                            <h2 class="course-details__price-amount">$<?= htmlspecialchars(rand(50, 5000)) ?>.00</h2>
                            <div class="course-details__price-btn">
                                <a href="register.php" class="thm-btn"> Subscribe
                                </a>
                            </div>
                        </div>

                        <div class="course-details__sidebar-meta wow fadeInUp animated" data-wow-delay="0.3s">
                            <ul class="course-details__sidebar-meta-list list-unstyled">
                                <li class="course-details__sidebar-meta-list-item">
                                    <div class="icon">
                                        <a href=""><i class="far fa-clock"></i></a>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">Durations:<span>10 hours</span></a></p>
                                    </div>
                                </li>

                                <li class="course-details__sidebar-meta-list-item">
                                    <div class="icon">
                                        <a href=""><i class="far fa-folder-open"></i></a>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">Lectures:<span>6</span></a></p>
                                    </div>
                                </li>

                                <li class="course-details__sidebar-meta-list-item">
                                    <div class="icon">
                                        <a href=""><i class="far fa-user-circle"></i></a>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">Students:<span> Max 6</span></a></p>
                                    </div>
                                </li>

                                <li class="course-details__sidebar-meta-list-item">
                                    <div class="icon">
                                        <a href=""><i class="fas fa-play"></i></a>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">Video:<span>8 hours</span></a></p>
                                    </div>
                                </li>

                                <li class="course-details__sidebar-meta-list-item">
                                    <div class="icon">
                                        <a href=""><i class="far fa-flag"></i></a>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">Skill Level:<span>Advanced</span></a></p>
                                    </div>
                                </li>

                                <li class="course-details__sidebar-meta-list-item">
                                    <div class="icon">
                                        <a href=""><i class="far fa-bell"></i></a>
                                    </div>
                                    <div class="text">
                                        <p><a href="#">Language:<span>English</span></a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if ($courses && count($courses) > 0) {
                            foreach ($courses as $courseItem) {
                                ?>
                                <div class="course-details__new-courses wow fadeInUp animated" data-wow-delay="0.5s">
                                    <h3 class="course-details__new-courses-title">New Courses</h3>
                                    <ul class="course-details__new-courses-list list-unstyled">
                                        <li class="course-details__new-courses-list-item">
                                            <div class="course-details__new-courses-list-item-img">
                                                <img src="../assets/images/resources/course-details-sidebar-img1.png" alt=""/>
                                            </div>
                                            <div class="course-details__new-courses-list-item-content">
                                                <h4 class="course-details__new-courses-list-item-content-title"> <a href="course-details.php?id=<?= htmlspecialchars($courseItem['idCours']) ?>">
                                <?= htmlspecialchars($courseItem['titre']) ?>
                            </a> <br><?= htmlspecialchars($courseItem['fullname']) ?></a></h4>
                                                <div class="course-details__new-courses-rateing-box">
                                                    <ul class="list-unstyled">
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                        <li><i class="fas fa-star"></i></li>
                                                    </ul>
                                                    <div class="course-details__new-courses-rateing-count">
                                                        <span>(4)</span>
                                                    </div>
                                                </div>
                                                <p class="course-details__new-courses-price">$<?= htmlspecialchars(rand(50, 5000)) ?>.00</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                        <?php
                                }
                            } else {
                                echo "<p>No courses available.</p>";
                            }
                        ?>
                    </div>
                </div>
                <!--End Course Details Sidebar-->
            </div>
        </div>
    </section>
    <!--End Course Details-->


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
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="#">Overview</a></li>
                                <li><a href="teachers-1.php">Teachers</a></li>
                                <li><a href="#">Join Us</a></li>
                                <li><a href="news.php">Our News</a></li>
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
                <a href="../index.php" aria-label="logo image"><img src="../assets/images/resources/mobilemenu_logo.png" width="155" alt="" /></a>
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


    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

    <!-- template js -->
    <script src="../assets/js/zilom.js"></script>


</body>

</html>