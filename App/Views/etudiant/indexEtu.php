<?php
require_once '../autoload.php';
use Classes\Categorie;
use Classes\Cours;
session_start();


if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 3)) {
    header("Location: ../index.php");
    exit;
}
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';


$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 8;
$courses = Cours::SearchCours($searchQuery, $page, $limit);
$total_courses = Cours::getTotalCoursesserch($searchQuery);
$total_pages = ceil($total_courses / $limit);

// Fetch categories
$categories = Categorie::showCategories();

// Group courses by category
$coursesByCategory = [];
if ($courses && count($courses) > 0) {
    foreach ($courses as $course) {
        $coursesByCategory[$course['categorie_id']][] = $course;
    }
}
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
    <nav class="bg-indigo-600 shadow-lg fixed w-full top-0 left-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2">
                <a href="index.php"><img src="../assets/images/resources/logo-2.png" alt="" /></a>

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
                                        <button type="submit" name="submit"
                                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                            Logout
                                        </button>
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="relative">
                    <form action="indexEtu.php" method="GET" class="relative mb-6">
                        <input type="text" name="search" id="search"
                            value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search courses..."
                            class="py-2 md:px-4 rounded-full border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-300 w-full">
                        <button type="submit" class="absolute right-3 top-3 text-gray-400">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

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
                                <button type="submit" name="submit"
                                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section-title text-center mt-40 w-full">
        <span class="section-title__tagline">Checkout New List</span>
        <h2 class="section-title__title">Explore Courses</h2>
    </div>
    <div class="container">

        <div class="row">
            <div class="courses-one--courses__top">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="courses-one--courses__menu-box">
                        <ul id="category-filter" class="project-filter clearfix post-filter list-unstyled">
                            <li data-category="all" class="active"><span class="filter-text">All</span></li>
                            <?php
                            if ($categories && count($categories) > 0) {
                                foreach ($categories as $category) {
                                    echo '<li data-category="' . htmlspecialchars($category['idCategory']) . '">
                                        <span class="filter-text">' . htmlspecialchars($category['nom']) . '</span>
                                    </li>';
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

        <section id="courses-list" class="container">
            <?php
            if ($categories && count($categories) > 0) {
                foreach ($categories as $category) {
                    echo '<div class="category-section category-' . htmlspecialchars($category['idCategory']) . '">';
                    echo '<h3 class="text-indigo-600 text-xl font-semibold mt-6 mb-4">' . htmlspecialchars($category['nom']) . '</h3>';
                    if (isset($coursesByCategory[$category['idCategory']]) && count($coursesByCategory[$category['idCategory']]) > 0) {
                        echo '<div class="row">';
                        foreach ($coursesByCategory[$category['idCategory']] as $courseItem) {
                            $imageSrc = ($courseItem['type'] === 'text')
                                ? '../assets/images/backgrounds/text.webp'
                                : '../assets/images/backgrounds/video.webp';
                            ?>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="courses-one__single">
                                    <div class="courses-one__single-img">
                                        <img src="<?= htmlspecialchars($imageSrc) ?>" alt="Course Image" />
                                        <div class="overlay-text">
                                            <p><?= htmlspecialchars($courseItem['type']) ?></p>
                                        </div>
                                    </div>
                                    <div class="courses-one__single-content">
                                        <h6 class="courses-one__single-content-name">
                                            <?= htmlspecialchars($courseItem['fullname']) ?>
                                        </h6>
                                        <h4 class="courses-one__single-content-title">
                                            <a href="course-details.php?id=<?= htmlspecialchars($courseItem['idCours']) ?>">
                                                <?= htmlspecialchars($courseItem['titre']) ?>
                                            </a>
                                        </h4>
                                        <p class="courses-one__single-content-description">
                                            <?= htmlspecialchars(substr($course['description'], 0, 20)) ?>                <?= strlen($course['description']) > 20 ? '...' : '' ?>
                                        <div class="courses-one__single-content-price">$<?= htmlspecialchars(rand(50, 5000)) ?>.00
                                        </div>
                                        <!-- Form for enrolling -->
                                        <form action="inscription.php" method="POST" onsubmit="return handleFormSubmit(event)">
                                            <input type="hidden" name="etudiant_id" value="<?= $_SESSION['id_user']; ?>">
                                            <input type="hidden" name="cours_id"
                                                value="<?= htmlspecialchars($courseItem['idCours']) ?>">
                                            <button type="submit"
                                                class="bg-indigo-600 text-white px-4 py-2 rounded mt-2 hover:bg-indigo-700"
                                                id="enroll-btn">
                                                Enroll
                                            </button>
                                        </form>

                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>
                                            function handleFormSubmit(event) {
                                                event.preventDefault();

                                                const form = event.target;
                                                const formData = new FormData(form);

                                                fetch(form.action, {
                                                    method: 'POST',
                                                    body: formData
                                                })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        if (data.success) {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Success',
                                                                text: data.message,
                                                            });
                                                        } else {
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Error',
                                                                text: data.error || 'Something went wrong!',
                                                            });
                                                        }
                                                    })
                                                    .catch(error => {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: 'A network error occurred.',
                                                        });
                                                        console.error('Error:', error);
                                                    });

                                                return false;
                                            }
                                        </script>



                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    } else {
                        echo '<p class="text-gray-500">No courses available in this category.</p>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No categories available.</p>';
            }
            ?>

        </section>

        </section>
        <div class="flex justify-center space-x-2 mt-4 flex-wrap">
            <a href="?page=<?php echo max(1, $page - 1); ?>&search=<?php echo urlencode($searchQuery); ?>"
                class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded-full hover:bg-indigo-600 hover:text-white transition duration-300">
                Previous
            </a>

            <?php
            for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
                echo '<a href="?page=' . $page_number . '&search=' . urlencode($searchQuery) . '" 
                  class="px-4 py-2 ' .
                    ($page_number == $page ? 'bg-indigo-600 text-white' : 'text-indigo-600') .
                    ' border border-indigo-600 rounded-full hover:bg-indigo-600 hover:text-white transition duration-300">
                  ' . $page_number .
                    '</a>';
            }
            ?>

            <a href="?page=<?php echo min($total_pages, $page + 1); ?>&search=<?php echo urlencode($searchQuery); ?>"
                class="px-4 py-2 text-indigo-600 border border-indigo-600 rounded-full hover:bg-indigo-600 hover:text-white transition duration-300">
                Next
            </a>
        </div>



    </div>

    <!-- Footer -->
    <footer class="mt-10">
        <div class="container mx-auto px-4 py-4 text-center text-black">
            &copy; 2025 Zilom . All rights reserved, by Tbibzat Charaf Eddine.
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const filterItems = document.querySelectorAll("#category-filter li");
            const coursesSections = document.querySelectorAll(".category-section");
            filterItems.forEach(item => {
                item.addEventListener("click", () => {
                    const category = item.getAttribute("data-category");
                    filterItems.forEach(filter => filter.classList.remove("active"));
                    item.classList.add("active");
                    coursesSections.forEach(section => {
                        if (category === "all" || section.classList.contains(`category-${category}`)) {
                            section.style.display = "block";
                        } else {
                            section.style.display = "none";
                        }
                    });
                });
            });
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