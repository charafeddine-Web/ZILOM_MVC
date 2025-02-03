<?php
require_once '../autoload.php';
use Classes\Inscription;
session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 3)) {
  header("Location: ../index.php");
  exit;
}

if (isset($_SESSION['id_user'])){
    $etudient=$_SESSION['id_user'];
};
$insecription = new Inscription();
$mecours=$insecription->getAllInscriptionsEtudient($etudient);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navigation Bar -->
    <nav class="bg-indigo-600 shadow-lg fixed w-full top-0 left-0 z-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="#"><img src="../assets/images/resources/logo-2.png" alt="" /></a>

                <!-- Hamburger Button for Mobile -->
                <button id="hamburger" class="lg:hidden text-white">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Menu Items (Hidden on Mobile) -->
                <div class="hidden lg:flex space-x-6">
                    <a href="indexEtu.php" class="text-white flex items-center hover:text-gray-200">
                        <i class="fas fa-book mr-2"></i>All Courses
                    </a>
                    <a href="mecours.php" class="text-white flex items-center hover:text-gray-200">
                        <i class="fas fa-folder-open mr-2"></i>My Courses
                    </a>
                    <div class="relative">
                        <!-- Profile Link -->
                        <a href="#" class="text-white flex items-center hover:text-gray-200" id="profileToggle">
                            <i class="fas fa-user-circle mr-2"></i>Profile
                        </a>
                        <div id="profileDropdown" 
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <ul class="py-2">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <form action="../logout.php" method="post">
                                        <button type="submit" name="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        Logout
                                        </button>
                                    </form>
                                   
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <input type="text" placeholder="Search courses..."
                        class="py-2 md:px-4 rounded-full border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>
    </nav>
<div id="sidebar" class="lg:hidden fixed inset-0 bg-gray-800 bg-opacity-75 z-20 hidden">
        <div class="flex justify-end p-4">
            <button id="close-sidebar" class="text-white text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex flex-col items-center">
            <a href="indexEtu.php" class="text-white py-2">All Courses</a>
            <a href="mecours.php" class="text-white py-2">My Courses</a>
            <div class="relative">
                        <!-- Profile Link -->
                        <a href="#" class="text-white flex items-center hover:text-gray-200" id="profileToggle">
                            <i class="fas fa-user-circle mr-2"></i>Profile
                        </a>
                        <div id="profileDropdown" 
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg hidden">
                            <ul class="py-2">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <form action="../logout.php" method="post">
                                        <button type="submit" name="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                        Logout
                                        </button>
                                    </form>
                                   
                                </li>
                            </ul>
                        </div>
                    </div>        </div>
    </div>

    <section class="section-title text-center mt-40  mx-4">
                <h2 class="section-title__title">Explore Your Courses</h2>
                <div class="row filter-layout masonary-layout mt-4 ">
    <?php
    if (is_array($mecours) && count($mecours) > 0 ) {
        foreach ($mecours as $course) {
            $imageSrc = ($course['type'] === 'text') 
                ? '../assets/images/backgrounds/text.webp' 
                : '../assets/images/backgrounds/video.webp';
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
                            <img src="../assets/images/resources/courses-v1-overlay-img-placeholder.png" alt=""/>
                        </div>
                        <h6 class="courses-one__single-content-name"><?= htmlspecialchars($course['fullname']) ?></h6>
                        <h4 class="courses-one__single-content-title">
                            <a href="course-details.php?id=<?= htmlspecialchars($course['idCours']) ?>">
                                <?= htmlspecialchars($course['titre']) ?>
                            </a>
                        </h4>
                        <p class="courses-one__single-content-description">
                        <?= htmlspecialchars(substr($course['description'], 0, 20)) ?><?= strlen($course['description']) > 20 ? '...' : '' ?>
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
    </section>
    

    </div>

    <!-- Footer -->
    <footer class=" mt-10">
        <div class="container mx-auto px-4 py-4 text-center text-black">
            &copy; 2025 Zilom . All rights reserved, by Tbibzat Charaf Eddine.
        </div>
    </footer>

   <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('hidden');
        });


//pour profile
        document.getElementById('profileToggle').addEventListener('click', function (event) {
        event.preventDefault(); 
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    });
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('profileDropdown');
        const profileToggle = document.getElementById('profileToggle');
        if (!profileToggle.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
    </script>
</body>

</html>
