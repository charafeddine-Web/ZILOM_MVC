<?php
require_once '../autoload.php';
use Classes\Cours;
use Classes\Inscription;
session_start();


if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 3)) {
    header("Location: ../index.php");
    exit;
}

if (isset($_SESSION['id_user'])) {
    $etudient = $_SESSION['id_user'];
}
;
$courseId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($courseId <= 0) {
    echo "Invalid course ID.";
    exit;
}

$course = Cours::getCoursById($courseId);

if (!$course) {
    echo "Course not found.";
    exit;
}
$instructorName = htmlspecialchars($course['enseignant_nom']);
$categoryName = htmlspecialchars($course['categorie_nom']);



// pour teset si etudient inscrire sur une cours or no 
$inscription = new Inscription();
$isEnrolled = $inscription->checkEnrollment($etudient, $courseId); //
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/css/zilom.css" />
    <link rel="stylesheet" href="../assets/css/zilom-responsive.css" />
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
        .course-details-container {
            padding: 2rem;
            background-color: #f9f9f9;
        }

        .course-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .course-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .course-details__review-box:hover,
        .course-details__comment-single:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navigation Bar -->
    <nav class="bg-indigo-600 shadow-lg fixed w-full top-0 left-0 z-10">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#"><img src="../assets/images/resources/logo-2.png" alt="" /></a>

                <button id="hamburger" class="lg:hidden text-white">
                    <i class="fas fa-bars"></i>
                </button>

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

    <!-- Sidebar for Mobile -->
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
                        <a href="#" class="text-white py-2 flex items-center hover:text-gray-200" id="profileToggle">
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
    </div>



    <div class="min-h-screen flex items-center justify-center bg-gray-100 mt-20">
    <div class="course-content w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 p-4 md:p-8 bg-white shadow-lg rounded-lg">
        <div class="course-image-container md:col-span-1">
            <?php if (!$isEnrolled): ?>
                <div class="not-enrolled-message bg-yellow-100 text-yellow-800 p-4 rounded-md shadow-md">
                    <p>
                        <strong>Note:</strong> You are not enrolled in this course.
                        Please <a href="#" class="text-indigo-600 hover:underline">enroll now</a> to access the course materials.
                    </p>
                </div>
            <?php else: ?>
                <div class="enrolled-message bg-green-100 text-green-800 p-4 rounded-md shadow-md">
                    <p>Welcome! You are successfully enrolled in this course.</p>
                </div>
                <div class="mt-4">
                <?php if ($course['type'] === 'video'): ?>
                    <div class="video-container">
                        <video controls autoplay class="w-full rounded-lg shadow-md">
                            <source src="../enseignant/uploads/videos/<?= htmlspecialchars($course['contenu'] ?? 'default-video.mp4') ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php else: ?>
                    <div class="text-container p-4 bg-gray-100 rounded-lg shadow-md">
                        <p class="text-gray-700 text-lg">
                            <?= nl2br(htmlspecialchars($course['contenu'] ?? 'No course text available.')) ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="course-details-container md:col-span-2 space-y-6">
            <div class="course-header bg-gradient-to-r from-indigo-600 to-indigo-500 text-white p-8 rounded-lg shadow-md">
                <h2 class="text-4xl font-semibold"><?= htmlspecialchars($course['titre'] ?? 'Course Title') ?></h2>
                <p class="text-xl mt-4"><?= htmlspecialchars($course['description'] ?? 'Course Description') ?></p>
            </div>

            <?php if ($isEnrolled): ?>
                <div class="course-materials mt-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Course Materials:</h2>
                    <div class="space-y-4">
                        <div class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition">
                            <h3 class="text-lg font-semibold"><?= htmlspecialchars($course['titre'] ?? 'Material Title') ?></h3>
                            <p class="text-gray-600"><?= htmlspecialchars($course['description'] ?? 'Material Description') ?></p>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3 p-4 bg-gray-100 rounded-lg shadow-md">
                                <i class="fas fa-user-circle text-indigo-600 text-2xl"></i>
                                <p class="text-gray-700"><?= htmlspecialchars($instructorName ?? 'Instructor Name') ?></p>
                            </div>
                            <div class="flex items-center space-x-3 p-4 bg-gray-100 rounded-lg shadow-md">
                                <i class="fas fa-folder-open text-indigo-600 text-2xl"></i>
                                <p class="text-gray-700"><?= htmlspecialchars($categoryName ?? 'Category Name') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Reviews -->
            <div class="course-details__reviews">
                <h3 class="text-2xl font-semibold text-gray-800">Reviews</h3>
                <div class="mt-6 flex gap-6">
                    <div class="w-2/3 bg-gray-100 p-4 rounded-lg shadow-md">
                        <p class="text-lg font-semibold">Excellent</p>
                        <div class="relative w-full h-4 bg-gray-200 rounded-full mt-2">
                            <div class="absolute top-0 left-0 h-full bg-indigo-600 rounded-full" style="width: 90%;"></div>
                        </div>
                    </div>
                    <div class="w-1/3 bg-white p-6 rounded-lg shadow-md text-center">
                        <h2 class="text-4xl font-semibold text-indigo-600">4.6</h2>
                        <p class="text-gray-600">30 reviews</p>
                    </div>
                </div>
            </div>

            <!-- Add Review Form -->
            <div class="course-details__add-review bg-white p-6 rounded-lg shadow-md mt-8">
                <h2 class="text-2xl font-semibold text-indigo-600 mb-4">Add a Review</h2>
                <form action="../assets/inc/sendemail.php" method="post" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="name" placeholder="Your name"
                            class="p-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500">
                        <input type="email" name="email" placeholder="Your email"
                            class="p-3 border border-gray-300 rounded-lg w-full focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <textarea name="message" placeholder="Write your review"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" rows="4"></textarea>
                    <button type="submit"
                        class="block w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                        Submit Review
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>
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