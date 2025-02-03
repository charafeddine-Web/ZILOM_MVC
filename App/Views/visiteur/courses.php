<?php
require_once '../autoload.php';
use Classes\Categorie;
use Classes\Cours;
session_start();

$cours=Cours::ShowCours();

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 8; 
$courses = Cours::ShowCours($currentPage, $limit);
$totalCourses = Cours::getTotalCourses();
$totalPages = ceil($totalCourses / $limit); 


// Fetch categories
$categories = Categorie::showCategories();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses || Udemey</title>
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

        /* General Search Popup Styling */
.search-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.search-popup__content {
    background: #fff;
    border-radius: 8px;
    max-width: 800px;
    width: 100%;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.search-form {
    margin-bottom: 20px;
}

.search-bar {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 4px;
    overflow: hidden;
}

.search-input {
    flex: 1;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    outline: none;
}

.search-button {
    background: #007bff;
    color: #fff;
    padding: 10px 15px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
}

.search-button:hover {
    background: #0056b3;
}

/* Search Results Grid */
.search-results {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
}

.search-results .course-card {
    background: #f9f9f9;
    border: 1px solid #eaeaea;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.search-results .course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.course-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.course-card-content {
    padding: 15px;
}

.course-card-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.course-card-title a {
    text-decoration: none;
    color: inherit;
}

.course-card-title a:hover {
    color: #007bff;
}

.course-card-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.course-card-price {
    font-size: 16px;
    font-weight: bold;
    color: #28a745;
}

        .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    padding: 10px 15px;
    margin: 0 5px;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #333;
}

.pagination a.active {
    background-color: indigo;
    color: white;
}

.pagination a:hover {
    background-color: #ddd;
}
/**pour logout */
     
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


        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content">

            </div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->



    <!--Page Header Start-->
    <section class="page-header clearfix" style="background-image: url(../assets/images/backgrounds/courses.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page-header__wrapper clearfix">
                        <div class="page-header__title">
                            <h2>Courses</h2>
                        </div>
                        <div class="page-header__menu">
                            <ul class="page-header__menu-list list-unstyled clearfix">
                                <li><a href="../index.php">Home</a></li>
                                <li class="active">Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--Page Header End-->


    <!--Courses One Start-->
    <section class="courses-one courses-one--courses">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Checkout New List</span>
                <h2 class="section-title__title">Explore Courses</h2>
            </div>



<div class="row">
    <div class="courses-one--courses__top">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="courses-one--courses__menu-box">
                <ul class="project-filter clearfix post-filter has-dynamic-filters-counter list-unstyled">
                    <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                    <?php
                    if ($categories && count($categories) > 0) {
                        foreach ($categories as $category) {
                            echo '<li data-filter=".'. htmlspecialchars($category['nom']) .'"><span class="filter-text">'. htmlspecialchars($category['nom']) .'</span></li>';
                        }
                    } else {
                        echo "<li>No categories available.</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row filter-layout masonary-layout">
    <?php
    if ($courses && count($courses) > 0) {
        foreach ($courses as $courseItem) {
            $imageSrc = ($courseItem['type'] === 'text') 
                ? '../assets/images/backgrounds/text.webp' 
                : '../assets/images/backgrounds/video.webp';
            ?>
            <div class="col-xl-3 col-lg-6 col-md-6 filter-item <?= htmlspecialchars($courseItem['type']) ?>">
                <div class="courses-one__single wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <div class="courses-one__single-img">
                        <img src="<?= htmlspecialchars($imageSrc) ?>" alt="Course Image"/>
                        <div class="overlay-text">
                            <p><?= htmlspecialchars($courseItem['type']) ?></p>
                        </div>
                    </div>
                    <div class="courses-one__single-content">
                        <h6 class="courses-one__single-content-name"><?= htmlspecialchars($courseItem['fullname']) ?></h6>
                        <h4 class="courses-one__single-content-title">
                            <a href="course-details.php?id=<?= htmlspecialchars($courseItem['idCours']) ?>">
                                <?= htmlspecialchars($courseItem['titre']) ?>
                            </a>
                        </h4>
                        <p class="courses-one__single-content-description"><?= htmlspecialchars($courseItem['description']) ?></p>
                        <div class="courses-one__single-content-price">$<?= htmlspecialchars(rand(50, 5000)) ?>.00</div>

                        <?php if (!empty($courseItem['tags'])): ?>
                            <div class="course-tags">
                                <strong>Tags: </strong>
                                <?= htmlspecialchars($courseItem['tags']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No courses available.</p>";
    }
    ?>
</div>

<div class="pagination">
    <?php if ($currentPage > 1): ?>
        <a href="?page=<?= $currentPage - 1 ?>" class="prev">Previous</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= ($i == $currentPage) ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>
    
    <?php if ($currentPage < $totalPages): ?>
        <a href="?page=<?= $currentPage + 1 ?>" class="next">Next</a>
    <?php endif; ?>
</div>


        </div>
    </section>
    <!--Courses One End-->








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
    <div class="search-popup__content">
        <form id="search-form">
            <label for="search" class="sr-only">Search here</label>
            <input type="text" id="search" name="search" placeholder="Search Here..." class="search-input" />
            <button type="submit" aria-label="search submit" class="thm-btn2">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

        <div id="search-results" class="search-results pt-2">
            <p class="placeholder-text">Search for courses to see results...</p>
        </div>
    </div>
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

    <script>
    document.getElementById("search-form").addEventListener("submit", function (e) {
    e.preventDefault();
    const searchQuery = document.getElementById("search").value; 
    const resultsContainer = document.getElementById("search-results");

    resultsContainer.innerHTML = '<p class="col-12 text-center">Searching...</p>';

    fetch("search_handler.php?search=" + encodeURIComponent(searchQuery))
        .then(response => response.json()) 
        .then(data => {
            resultsContainer.innerHTML = "";

            if (data.length > 0) {
                data.forEach(course => {
                    const courseCard = `
                        <div class="col-xl-3 col-lg-6 col-md-2 bg-white filter-item ${course.type}">
                            <div class="courses-one__single bg-white">
                                <div class="courses-one__single-img">
                                    <img src="${course.type === 'text' ? '../assets/images/backgrounds/text.webp' : '../assets/images/backgrounds/video.webp'}" alt="Course Image" />
                                    <div class="overlay-text">
                                        <p>${course.type}</p>
                                    </div>
                                </div>
                                <div class="courses-one__single-content">
                                    <h6 class="courses-one__single-content-name">${course.fullname}</h6>
                                    <h4 class="courses-one__single-content-title">
                                        <a href="course-details.php?id=${course.idCours}">${course.titre}</a>
                                    </h4>
                                    <p class="courses-one__single-content-description">${course.description}</p>
                                    <div class="courses-one__single-content-price">$${course.price}.00</div>
                                </div>
                            </div>
                        </div>
                    `;
                    resultsContainer.innerHTML += courseCard;
                });
            } else {
                resultsContainer.innerHTML = `<p class="col-12 text-center">No results found for "${searchQuery}"</p>`;
            }
        })
        .catch(error => {
            resultsContainer.innerHTML = `<p class="col-12 text-center text-danger">Error fetching results. Please try again later.</p>`;
            console.error("Error:", error);
        });
});

</script>

</body>

</html>