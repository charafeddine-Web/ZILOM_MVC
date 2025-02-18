
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home  || Udemey </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Crsine HTML Template For Car Services" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/icomoon-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/vendors/twentytwenty/twentytwenty.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/zilom.css" />
    <link rel="stylesheet" href="assets/css/zilom-responsive.css" />

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
        <img class="preloader__image" width="60" src="assets/images/loader.png" alt="" />
    </div>

    <!-- /.preloader -->
    <div class="page-wrapper">

        <header class="main-header main-header--one  clearfix">
            <div class="main-header--one__top clearfix">
                <div class="container">
                    <div class="main-header--one__top-inner clearfix">
                        <div class="main-header--one__top-left">
                            <div class="main-header--one__top-logo">
                                <a href="index.php"><img src="assets/images/resources/logo-1.png" alt="" /></a>
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
                                        <li class="dropdown current">
                                            <a href="/ZILOM_MVC/public/">Home</a>
                                        </li>
                                        <li><a href="/ZILOM_MVC/public/visiteur/about">About</a></li>
                                        <li class="dropdown">
                                            <a href="/ZILOM_MVC/public/visiteur/courses">Courses</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="/ZILOM_MVC/public/visiteur/teachers-1"> Teachers</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="/ZILOM_MVC/public/visiteur/news">News</a>
                                        </li>
                                        <li><a href="/ZILOM_MVC/public/visiteur/contact">Contact</a></li>
                                    </ul>
                                </div>

                                <div class="right">
                                    <div class="main-menu__right">
                                        <div class="main-menu__right-login-register">
                                        <?php
                                            if(!isset($_SESSION['id_user'])){
                                            ?>
                                            <ul class="list-unstyled">
                                                <li><a href="/ZILOM_MVC/public/login">Login</a></li>
                                                <li><a href="/ZILOM_MVC/public/register">Register</a></li>
                                            </ul>
                                            <?php }else {

                                            ?>
                                                <div class="b-flex justify-content-end flex ">

                                                <div>
                                                    <form action="/ZILOM_MVC/public/logout" method="POST">
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


        <section class="main-slider main-slider-one">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 7000
        }}'>

                <div class="swiper-wrapper">
                    <!--Start Single Swiper Slide-->
                    <div class="swiper-slide">
                        <div class="shape1"><img src="assets/images/shapes/slider-v1-shape1.png" alt="" /></div>
                        <div class="shape2"><img src="assets/images/shapes/slider-v1-shape2.png" alt="" /></div>
                        <div class="image-layer"
                            style="background-image: url(assets/images/backgrounds/main-slider-v1-1.jpg);"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="main-slider__content">
                                <div class="main-slider__content-icon-one">
                                    <span class="icon-lamp"></span>
                                </div>
                                <div class="main-slider__content-icon-two">
                                    <span class="icon-human-resources"></span>
                                </div>
                                <div class="main-slider-one__round-box">
                                    <div class="main-slider-one__round-box-inner">
                                        <p>Professional <br>teachers</p>
                                        <div class="icon">
                                            <i class="fas fa-sort-up"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-slider__content-tagline">
                                    <h2>Ready to learn?</h2>
                                </div>
                                <h2 class="main-slider__content-title">Learn new <br>things daily</h2>
                                <p class="main-slider__content-text">Get free access to 6800+ different courses from
                                    <br> 680 professional teachers</p>
                                <div class="main-slider__content-btn">
                                    <a href="#" class="thm-btn">Discover more</a>
                                </div>
                                <div class="main-slider-one__img">
                                    <img src="assets/images/backgrounds/main-slider-v2-1.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Swiper Slide-->

                    <!--Start Single Swiper Slide-->
                    <div class="swiper-slide">
                        <div class="shape1"><img src="assets/images/shapes/slider-v1-shape1.png" alt="" /></div>
                        <div class="shape2"><img src="assets/images/shapes/slider-v1-shape2.png" alt="" /></div>
                        <div class="image-layer"
                            style="background-image: url(assets/images/backgrounds/main-slider-v1-1.jpg);"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="main-slider__content">
                                <div class="main-slider__content-icon-one">
                                    <span class="icon-lamp"></span>
                                </div>
                                <div class="main-slider__content-icon-two">
                                    <span class="icon-human-resources"></span>
                                </div>
                                <div class="main-slider-one__round-box">
                                    <div class="main-slider-one__round-box-inner">
                                        <p>Professional <br>teachers</p>
                                        <div class="icon">
                                            <i class="fas fa-sort-up"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-slider__content-tagline">
                                    <h2>Ready to learn?</h2>
                                </div>
                                <h2 class="main-slider__content-title">Learn new <br>things daily</h2>
                                <p class="main-slider__content-text">Get free access to 6800+ different courses from
                                    <br> 680 professional teachers</p>
                                <div class="main-slider__content-btn">
                                    <a href="#" class="thm-btn">Discover more</a>
                                </div>
                                <div class="main-slider-one__img">
                                    <img src="assets/images/backgrounds/main-slider-v1-img.jpg" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Swiper Slide-->

                    <!--Start Single Swiper Slide-->
                    <div class="swiper-slide">
                        <div class="shape1"><img src="assets/images/shapes/slider-v1-shape1.png" alt="" /></div>
                        <div class="shape2"><img src="assets/images/shapes/slider-v1-shape2.png" alt="" /></div>
                        <div class="image-layer"
                            style="background-image: url(assets/images/backgrounds/main-slider-v1-1.jpg);"></div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="main-slider__content">
                                <div class="main-slider__content-icon-one">
                                    <span class="icon-lamp"></span>
                                </div>
                                <div class="main-slider__content-icon-two">
                                    <span class="icon-human-resources"></span>
                                </div>
                                <div class="main-slider-one__round-box">
                                    <div class="main-slider-one__round-box-inner">
                                        <p>Professional <br>teachers</p>
                                        <div class="icon">
                                            <i class="fas fa-sort-up"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-slider__content-tagline">
                                    <h2>Ready to learn?</h2>
                                </div>
                                <h2 class="main-slider__content-title">Learn new <br>things daily</h2>
                                <p class="main-slider__content-text">Get free access to 6800+ different courses from
                                    <br> 680 professional teachers</p>
                                <div class="main-slider__content-btn">
                                    <a href="#" class="thm-btn">Discover more</a>
                                </div>
                                <div class="main-slider-one__img">
                                    <img src="assets/images/backgrounds/main-slider-v1-img.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Swiper Slide-->
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <span class="icon-left"></span>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <span class="icon-right"></span>
                    </div>
                </div>

            </div>
        </section>








        <!--Features One Start-->
        <section class="features-one">
            <div class="container">
                <div class="row">
                    <!--Start Single Features One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="features-one__single">
                            <div class="features-one__single-icon">
                                <span class="icon-empowerment"></span>
                            </div>
                            <div class="features-one__single-text">
                                <h4><a href="#">Learn Skills</a></h4>
                                <p>with unlimited courses</p>
                            </div>
                        </div>
                    </div>
                    <!--End Single Features One-->

                    <!--Start Single Features One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="features-one__single">
                            <div class="features-one__single-icon">
                                <span class="icon-human-resources-1"></span>
                            </div>
                            <div class="features-one__single-text">
                                <h4><a href="#">Expert Teachers</a></h4>
                                <p>best & highly qualified</p>
                            </div>
                        </div>
                    </div>
                    <!--End Single Features One-->

                    <!--Start Single Features One-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="features-one__single">
                            <div class="features-one__single-icon">
                                <span class="icon-recruitment"></span>
                            </div>
                            <div class="features-one__single-text">
                                <h4><a href="#">Certificates</a></h4>
                                <p>value all over the world</p>
                            </div>
                        </div>
                    </div>
                    <!--End Single Features One-->
                </div>
            </div>
        </section>
        <!--Features One End-->



        <!--About One Start-->
        <section class="about-one clearfix">
            <div class="container">
                <div class="row">
                    <!-- Start About One Left-->
                    <div class="col-xl-6">
                        <div class="about-one__left">
                            <ul class="about-one__left-img-box list-unstyled clearfix">
                                <li class="about-one__left-single">
                                    <div class="about-one__left-img1">
                                        <img src="assets/images/about/about-v1-img2.jpeg" alt="" />
                                    </div>
                                </li>
                                <li class="about-one__left-single">
                                    <div class="about-one__left-img2">
                                        <img src="assets/images/about/about-v2-img2.jpg" alt="" />
                                    </div>
                                </li>
                            </ul>
                            <div class="about-one__left-overlay">
                                <div class="icon">
                                    <span class="icon-relationship"></span>
                                </div>
                                <div class="title">
                                    <h6>Trusted by<br><span class="odometer" data-count="8800">00</span> customers</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End About One Left-->


                    <!-- Start About One Right-->
                    <div class="col-xl-6">
                        <div class="about-one__right">
                            <div class="section-title">
                                <span class="section-title__tagline">About YouCode Company</span>
                                <h2 class="section-title__title">Welcome to the Online <br>Learning Center</h2>
                            </div>
                            <div class="about-one__right-inner">
                                <p class="about-one__right-text">There are many variations of passages of lorem ipsum
                                    available but the majority have suffered alteration in some form by injected humour
                                    or randomised words which don't look.</p>
                                <ul class="about-one__right-list list-unstyled">
                                    <li class="about-one__right-list-item">
                                        <div class="icon">
                                            <span class="icon-confirmation"></span>
                                        </div>
                                        <div class="text">
                                            <p>Get unlimited access to 66000+ of our top courses</p>
                                        </div>
                                    </li>

                                    <li class="about-one__right-list-item">
                                        <div class="icon">
                                            <span class="icon-confirmation"></span>
                                        </div>
                                        <div class="text">
                                            <p>Explore a variety of fresh educational topics</p>
                                        </div>
                                    </li>

                                    <li class="about-one__right-list-item">
                                        <div class="icon">
                                            <span class="icon-confirmation"></span>
                                        </div>
                                        <div class="text">
                                            <p>Find the best qualitfied teacher for you</p>
                                        </div>
                                    </li>
                                </ul>

                                <div class="about-one__btn">
                                    <a href="./visiteur/about.php" class="thm-btn">view all courses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End About One Right-->
                </div>
            </div>
        </section>
        <!--About One End-->


        <!--Courses One Start-->
        <section class="courses-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Checkout New List</span>
                    <h2 class="section-title__title">Explore Top Courses</h2>
                </div>
                <div class="row filter-layout masonary-layout">
    <?php
    if ($topCourses && count($topCourses) >0 ) {
        foreach ($topCourses as $course) {
            $imageSrc = ($course['type'] === 'text')
                ? 'assets/images/backgrounds/text.webp'
                : 'assets/images/backgrounds/video.webp';
            ?>
            <div class="col-xl-3 col-lg-6 col-md-6 filter-item <?= htmlspecialchars($course['type']) ?>">
                <div class="courses-one__single wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                    <div class="courses-one__single-img">
                        <img src="<?= htmlspecialchars($imageSrc) ?>" alt="Course Image"/>
                        <div class="overlay-text">
                            <p><?= htmlspecialchars($course['type']) ?></p>
                        </div>
                    </div>
                    <div class="courses-one__single-content">
                        <div class="courses-one__single-content-overlay-img">
                            <img src="assets/images/resources/courses-v1-overlay-img-placeholder.png" alt=""/>
                        </div>
                        <h6 class="courses-one__single-content-name"><?= htmlspecialchars($course['fullname']) ?></h6>
                        <h4 class="courses-one__single-content-title">
                        <a href="/ZILOM_MVC/public/visiteur/cours_details?=<?= htmlspecialchars($course['idcours']) ?>">
                                <?= htmlspecialchars($course['titre']) ?>
                            </a>
                        </h4>
                        <p class="courses-one__single-content-description">
                            <?= htmlspecialchars($course['description']) ?>
                        </p>
                        <div class="courses-one__single-content-review-box">
                            <ul class="list-unstyled">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <li>
                                        <i class="fa fa-star<?= $i < 4.5 ? '' : '-half' ?>"></i>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                            <div class="rateing-box">
                                <span>(4.5)</span>
                            </div>
                        </div>
                        <p class="courses-one__single-content-price">
                            $<?= htmlspecialchars(rand(50, 5000)) ?>.00
                        </p>
                        <ul class="courses-one__single-content-courses-info list-unstyled">
                            <li><?= htmlspecialchars($course['category']) ?></li>
                            <li><?= htmlspecialchars(date('F d, Y', strtotime($course['date_creation']))) ?></li>
                        </ul>
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

            </div>
        </section>
        <!--Courses One End-->
        <!--Categories One Start-->

        <!--Testimonials One Start-->
        <section class="testimonials-one clearfix">
            <div class="auto-container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Our Testimonials</span>
                    <h2 class="section-title__title">What They Say?</h2>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testimonials-one__wrapper">
                            <div class="testimonials-one__pattern"><img
                                    src="assets/images/pattern/testimonials-one-left-pattern.png" alt="" /></div>
                            <div class="shape1"><img src="/../../assets/images/shapes/thm-shape3.png" alt="" /></div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="testimonials-one__carousel owl-carousel owl-theme owl-dot-type1">
                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="0ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img1.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>Kevin Martin</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->

                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="100ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img2.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>Christine Eve</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->

                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="200ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img3.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>David Cooper</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->
                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="0ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img1.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>Kevin Martin</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->
                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="100ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img2.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>Christine Eve</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->
                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="200ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img3.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>David Cooper</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->
                                        <!--Start Single Testimonials One -->
                                        <div class="testimonials-one__single wow fadeInUp" data-wow-delay="0ms"
                                            data-wow-duration="1500ms">
                                            <div class="testimonials-one__single-inner">
                                                <h4 class="testimonials-one__single-title">Amazing Courses</h4>
                                                <p class="testimonials-one__single-text">Lorem ipsum is simply free text
                                                    dolor sit amet, consectetur notted adipisicing elit sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                                <div class="testimonials-one__single-client-info">
                                                    <div class="testimonials-one__single-client-info-img">
                                                        <img src="assets/images/testimonial/testimonials-v1-client-info-img1.png"
                                                            alt="" />
                                                    </div>
                                                    <div class="testimonials-one__single-client-info-text">
                                                        <h5>Kevin Martin</h5>
                                                        <p>Developer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Single Testimonials One -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonials One End-->


        <!--Company Logos One Start-->
        <section class="company-logos-one">
            <div class="container">
                <div class="company-logos-one__title text-center">
                    <h6>Who Will You Learn With?</h6>
                </div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 5
                }
            }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo2.jpg" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo3.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo4.svg" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo5.jpg" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo6.jpg" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo7.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/resources/logo1.png" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </section>
        <!--Company Logos One End-->


        <!--Why Choose One Start-->
        <section class="why-choose-one">
            <div class="container">
                <div class="row">
                    <!--Start Why Choose One Left-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="why-choose-one__left">
                            <div class="section-title">
                                <span class="section-title__tagline">Why Choose Us?</span>
                                <h2 class="section-title__title">Benefits of Learning <br>from Zilom</h2>
                            </div>
                            <p class="why-choose-one__left-text">There cursus massa at urnaaculis estie. Sed
                                aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla sed medy
                                fringilla vitae.</p>
                            <div class="why-choose-one__left-learning-box">
                                <div class="icon">
                                    <span class="icon-professor"></span>
                                </div>
                                <div class="text">
                                    <h4>Start learning from our experts and <br>enhance your skills</h4>
                                </div>
                            </div>
                            <div class="why-choose-one__left-list">
                                <ul class="list-unstyled">
                                    <li class="why-choose-one__left-list-single">
                                        <div class="icon">
                                            <span class="icon-confirmation"></span>
                                        </div>
                                        <div class="text">
                                            <p>Making this the first true on the Internet</p>
                                        </div>
                                    </li>

                                    <li class="why-choose-one__left-list-single">
                                        <div class="icon">
                                            <span class="icon-confirmation"></span>
                                        </div>
                                        <div class="text">
                                            <p>Lorem Ipsum is not simply random text</p>
                                        </div>
                                    </li>

                                    <li class="why-choose-one__left-list-single">
                                        <div class="icon">
                                            <span class="icon-confirmation"></span>
                                        </div>
                                        <div class="text">
                                            <p> If you are going to use a passage</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Why Choose One Left-->

                    <!--Start Why Choose One Right-->
                    <div class="col-xl-6 col-lg-6">
                        <div class="why-choose-one__right wow slideInRight animated clearfix" data-wow-delay="0ms"
                            data-wow-duration="1500ms">
                            <div class="why-choose-one__right-img clearfix">
                                <img src="assets/images/resources/assets/images/resources/why-choose-v1-img.jpg" alt="" />
                                <div class="why-choose-one__right-img-overlay">
                                    <p>We’re the best institution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Why Choose One Right-->

                </div>
            </div>
        </section>
        <!--Why Choose One End-->



        <!--Blog One Start-->
        <!-- <section class="blog-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Directly from the Blog</span>
                    <h2 class="section-title__title">Latest Articles</h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="assets/images/blog/blog-v1-img1.jpg" alt="" />
                            </div>
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><span class="icon-clock"></span>20 June</a></li>
                                        <li><a href="#"><span class="icon-user"></span>Admin </a></li>
                                        <li><a href="#"><span class="icon-chat"></span> Comments</a></li>
                                    </ul>
                                </div>
                                <h2 class="blog-one__single-content-title"><a href="./visiteur/news-details.php">Helping Answers
                                        Stand out in Discussions</a></h2>
                                <p class="blog-one__single-content-text">Lorem ipsum is simply free text on used by
                                    copytyping refreshing the whole area.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="assets/images/blog/blog-v1-img2.jpg" alt="" />
                            </div>
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><span class="icon-clock"></span>20 June</a></li>
                                        <li><a href="#"><span class="icon-user"></span>Admin </a></li>
                                        <li><a href="#"><span class="icon-chat"></span> Comments</a></li>
                                    </ul>
                                </div>
                                <h2 class="blog-one__single-content-title"><a href="./visiteur/news-details.php">Helping Answers
                                        Stand out in Discussions</a></h2>
                                <p class="blog-one__single-content-text">Lorem ipsum is simply free text on used by
                                    copytyping refreshing the whole area.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="blog-one__single">
                            <div class="blog-one__single-img">
                                <img src="assets/images/blog/blog-v1-img3.jpg" alt="" />
                            </div>
                            <div class="blog-one__single-content">
                                <div class="blog-one__single-content-overlay-mata-info">
                                    <ul class="list-unstyled">
                                        <li><a href="#"><span class="icon-clock"></span>20 June</a></li>
                                        <li><a href="#"><span class="icon-user"></span>Admin </a></li>
                                        <li><a href="#"><span class="icon-chat"></span> Comments</a></li>
                                    </ul>
                                </div>
                                <h2 class="blog-one__single-content-title"><a href="./visiteur/news-details.php">Helping Answers
                                        Stand out in Discussions</a></h2>
                                <p class="blog-one__single-content-text">Lorem ipsum is simply free text on used by
                                    copytyping refreshing the whole area.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--Blog One End-->

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
                            <div class="shape1 zoom-fade"><img src="assets/images/shapes/thm-shape2.png" alt="" /></div>
                            <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
                                    src="assets/images/shapes/thm-shape3.png" alt="" /></div>
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
            <div class="footer-one__bg" style="background-image: url(assets/images/backgrounds/footer.jpg);">
            </div><!-- /.footer-one__bg -->
            <div class="footer-one__top">
                <div class="container">
                    <div class="row">
                        <!--Start Footer Widget Column-->
                        <div class="col-xl-2 col-lg-4 col-md-4 wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="index.php"><img src="assets/images/resources/footer-logo.png" alt=""></a>
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
                <a href="index.php" aria-label="logo image"><img src="assets/images/resources/mobilemenu_logo.png"
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


    <script src="assets/vendors/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/twentytwenty/twentytwenty.js"></script>
    <script src="assets/vendors/twentytwenty/jquery.event.move.js"></script>
    <script src="assets/vendors/parallax/parallax.min.js"></script>


    <script src="http://maps.google.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM"></script>

    <!-- template js -->
    <script src="assets/js/zilom.js"></script>


</body>

</html>