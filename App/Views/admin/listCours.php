<?php
require_once '../autoload.php';
use Classes\Categorie;
use Classes\Cours;
use Classes\Admin;
session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
    header("Location: ../index.php");
    exit;
}

$resultd =  Admin::ViewStatistic();
$result =  Cours::ViewStatisticcours();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href=".././assets/style.css">
    <script src=".././assets/tailwind.js"></script>
</head>

<body class="">
    <div class=" fixed top-0 left-0  w-[230px] h-[100%] z-50 overflow-hidden sidebar ">
    <a href="./index.php" class="logo text-xl font-bold h-[56px] flex items-center text-[#1976D2] z-30 pb-[20px] pl-8 box-content">
        <img src="../assets/images/resources/logo-1.png" alt="" />
        </a>
        <ul class="side-menu w-full mt-12">
    <li class=" h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="./index.php">
            <i class="fa-solid fa-chart-pie"></i> Statistic
        </a>
    </li>
    <li class="h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="listEtudiants.php">
            <i class="fa-solid fa-graduation-cap"></i> Étudiants
        </a>
    </li>
    <li class="h-12  bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listEnseignants.php">
            <i class="fa-solid fa-chalkboard-teacher"></i> Enseignants
        </a>
    </li>
    <li class="h-12 active bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCours.php">
            <i class="fa-solid fa-book-open"></i> Cours
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCategory.php">
            <i class="fa-solid fa-layer-group"></i> Catégories
        </a>
    </li>
    <li class="h-12  bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listTags.php">
            <i class="fa-solid fa-tags"></i> Tags
        </a>
    </li>
</ul>

       
<ul class="side-menu w-full mt-12">
            <li class="h-12 bg-transparent ml-2.2 md:ml-2 rounded-l-full p-1">
            <form action="../logout.php" method="POST">
                <button type="submit" name="submit" class="logout flex">
                    <i class='bx bx-log-out-circle'></i> Logout
                </button>
            </form>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->

    <!-- Content -->
    <div class="content ">
        <!-- Navbar -->
        <nav class="flex items-center gap-6 h-14 bg-[#f6f6f9] sticky top-0 left-0 z-50 px-6">
            <i class='bx bx-menu'></i>
            <form action="#" class="max-w-[400px] w-full mr-auto">
                <div class="form-input flex items-center h-[36px]">
                    <input
                        class="flex-grow px-[16px] h-full border-0 bg-[#eee] rounded-l-[36px] outline-none w-full text-[#363949]"
                        type="search" placeholder="Search...">
                    <button
                        class="w-[80px] h-full flex justify-center items-center bg-[#1976D2] text-[#f6f6f9] text-[18px] border-0 outline-none rounded-r-[36px] cursor-pointer"
                        type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle"
                class="theme-toggle block min-w-[50px] h-[25px] bg-grey cursor-pointer relative rounded-full"></label>
            <a href="#" class="notif text-[20px] relative">
                <i class='bx bx-bell'></i>
                <span
                    class="count absolute top-[-6px] right-[-6px] w-[20px] h-[20px] bg-[#D32F2F] text-[#f6f6f6] border-2 border-[#f6f6f9] font-semibold text-[12px] flex items-center justify-center rounded-full ">12</span>
            </a>
            <a href="#" class="profile">
                <img class="w-[36px] h-[36px] object-cover rounded-full" width="36" height="36"
                src="../assets/charaf.png.jfif">
                </a>
        </nav>

        <main class=" mainn w-full p-[36px_24px] max-h-[calc(100vh_-_56px)]">
            <div class="header flex items-center justify-between gap-[16px] flex-wrap">
                <div class="left">
                <ul class="breadcrumb flex items-center space-x-[16px]">
                        <li class="text-[#363949]"><a  href="listClients.php">
                                index &npr;
                            </a></li>
                        
                        <li class="text-[#363949]"><a href="listCars.php" >Etudients &npr;</a></li> 
                        <li class="text-[#363949]"><a href="listContrat.php">Enseignants &npr;</a></li> 
                        <li class="text-[#363949]"><a href="statistic.php" class="active">Cours &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php" >Categorys &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php">Tags &npr;</a></li>

                    </ul>

                </div>
                <a id="buttonadd" href="#"
                    class="  report h-[36px] px-[16px] rounded-[36px] bg-[#1976D2] text-[#f6f6f6] flex items-center justify-center gap-[10px] font-medium">
                    <i class="fa-solid fa-car"></i>
                    <span>Add Cours</span>
                </a>
            </div>
            <!-- insights-->
            <ul class="insights grid grid-cols-[repeat(auto-fit,_minmax(240px,_1fr))] gap-[24px] mt-[36px]">
   
    <li><i class="fa-solid fa-file-alt"></i>
        <span class="info">
            <h3>
                <?php
                if ($result && isset($result['res_cours_text'])) {
                    echo $result['res_cours_text'];
                } else {
                    echo "No data available.";
                }
                ?>
            </h3>
            <p>Text Courses</p>
        </span>
    </li>
    <li><i class="fa-solid fa-video"></i>
        <span class="info">
            <h3>
                <?php
                if ($result && isset($result['res_cours_video'])) {
                    echo $result['res_cours_video'];
                } else {
                    echo "No data available.";
                }
                ?>
            </h3>
            <p>Video Courses</p>
        </span>
    </li>
    <li class="flex flex-col items-center gap-3">
        <div class="enrolled-message bg-green-100 text-green-800 p-4 rounded-md shadow-md w-full">
            <p>Cours par Catégorie <strong class="font-bold text-black">
                <?php echo isset($resultd['courses_per_category']) ? $resultd['courses_per_category'] : "No data available."; ?>
            </strong></p>
        </div>
    </li>

    <li class="flex items-center gap-3">
        <div class="enrolled-message bg-green-100 text-green-800 p-4 rounded-md shadow-md">
            <p>Cours avec le Plus d'Étudiants <strong class="font-bold text-black">
                <?php echo isset($resultd['course_with_most_students']) ? $resultd['course_with_most_students'] : "No data available."; ?>
            </strong></p>
        </div>
    </li>

</ul>

            <!---- data content ---->
            <div class="bottom-data flex flex-wrap gap-[24px] mt-[24px] w-full">
            <div class="orders flex-grow flex-[1_0_500px]">
                <div class="header flex items-center gap-[16px] mb-[24px]">
                    <i class='bx bx-list-check'></i>
                    <h3 class="mr-auto text-[24px] font-semibold">List Cours</h3>
                    <i class='bx bx-filter'></i>
                    <i class='bx bx-search'></i>
                </div>
        <!--- tables---->
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">ID</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Titre</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Description</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">type</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Categorie</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Enseignant</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Date</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $cours = Cours::ShowallCours();
                    if ($cours) {
                        foreach ($cours as $cr) {
                            $availabilityColor = $cr['type'] === 'text' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                            $availabilityText = ucfirst($cr['type']);
                            echo "<tr class='hover:bg-gray-50 transition-all duration-300'>";
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($cr['idCours']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($cr['titre']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars(substr($cr['description'], 0, 15)) . '...</td>';
                            echo '<td class="border p-4"><span class="' . $availabilityColor . ' px-2 py-1 rounded-full text-center">' . $availabilityText . '</span></td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($cr['category']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($cr['fullname']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($cr['date_creation']) . '</td>';
                            echo '<td class="border p-4 flex space-x-2">';
                            echo '<a href="javascript:void(0);" class="text-green-600 hover:text-green-800 font-semibold" onclick="showVehicleDetails(' . $cr['idCours'] . ')">View</a>';
                            echo '</td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center p-4 text-gray-500'>No vehicles available.</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='8' class='text-center p-4 text-red-500'>Error: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

        </main>
    </div>
    <div id="addClientForm"
        class="add-client-form  fixed right-[-100%] rounded-xl w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px] bg-white">
        <form action="listCourse.php" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-4 overflow-y-auto h-full p-6 pb-20" id="courseForm">
            
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold flex items-center">
                <i class="fas fa-book mr-2"></i> Add Course
            </h2>
            <button type="button" id="closeForm"
                class="close-btn bg-red-500 text-white font-extrabold px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                X
            </button>
        </div>

        <!-- Dynamic Course Sections -->
        <div id="addcoursForm">
            <!-- Template for Course -->
            <div class="add-cours-form border-b-2 pb-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">Course Details</h3>

                <!-- Category -->
                <div class="form-group flex flex-col">
                    <label for="category" class="text-sm text-gray-700 mb-1">Category</label>
                    <div class="flex items-center">
                        <i class="fas fa-th-large text-gray-500 mr-2"></i>
                        <select name="category" class="p-2 border border-gray-300 rounded-lg outline-none text-sm w-full">
                            <?php
                            try {
                                $category = new Categorie(null, null, null,null);
                                $resultCat = $category->showCategories();

                                if ($resultCat) {
                                    foreach ($resultCat as $cat) {
                                        echo '<option class="text-black" value="' . htmlspecialchars($cat['id_category']) . '">' . htmlspecialchars($cat['nom']) . '</option>';
                                    }
                                } else {
                                    echo '<option class="text-black" value="">No categories found</option>';
                                }
                            } catch (\PDOException $e) {
                                echo '<option value="">Error loading categories</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Title -->
                <div class="form-group flex flex-col">
                    <label for="title" class="text-sm text-gray-700 mb-1">Course Title</label>
                    <div class="flex items-center">
                        <i class="fas fa-heading text-gray-500 mr-2"></i>
                        <input name="title" type="text" id="title" placeholder="Enter course title"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm w-full" required>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group flex flex-col">
                    <label for="description" class="text-sm text-gray-700 mb-1">Description</label>
                    <div class="flex items-center">
                        <i class="fas fa-pencil-alt text-gray-500 mr-2"></i>
                        <textarea name="description" id="description" placeholder="Enter course description"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm w-full" required></textarea>
                    </div>
                </div>

                <!-- Content Type -->
                <div class="form-group flex flex-col">
                    <label for="type" class="text-sm text-gray-700 mb-1">Content Type</label>
                    <div class="flex items-center">
                        <i class="fas fa-video text-gray-500 mr-2"></i>
                        <select name="type" id="type"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm w-full">
                            <option value="text">Text</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                </div>

                <!-- Availability -->
                <div class="form-group flex flex-col">
                    <label for="availability" class="text-sm text-gray-700 mb-1">Availability</label>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-gray-500 mr-2"></i>
                        <select name="availability" id="availability"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm w-full">
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                    </div>
                </div>

                <!-- Instructor -->
                <div class="form-group flex flex-col">
                    <label for="instructor" class="text-sm text-gray-700 mb-1">Instructor</label>
                    <div class="flex items-center">
                        <i class="fas fa-chalkboard-teacher text-gray-500 mr-2"></i>
                        <select name="" id="">

                        </select>
                    </div>
                </div>
                <div class="form-group flex flex-col">
                    <label for="coursvideo" class="text-sm text-gray-700 mb-1">Course Image</label>
                    <div class="flex items-center">
                        <i class="fas fa-image text-gray-500 mr-2"></i>
                        <input type="file" name="coursvideo" multiple id="coursvideo" accept="image/*"
                            class="p-2 border border-gray-300 rounded-lg outline-none text-sm w-full">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" name="submitformaddcours"
            class="submit-btn bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out mt-4">
            <i class="fas fa-paper-plane mr-2"></i> Submit Course
        </button>
    </form>
</div>



    <!-- Edit Car Form -->
    <?php
    // if (isset($_GET['id_vehicle'])) {
    //     $id_vehicle = $_GET['id_vehicle'];

    //     try {
    //         $car = Vehicle::ShowDetails($id_vehicle);

    //     } catch (\PDOException $e) {
    //         echo '<p class="text-red-500">Error fetching vehicle details: ' . $e->getMessage() . '</p>';
    //     }
    // }


    ?>
    <div id="editCarForm"
        class="edit-car-form hidden fixed right-[-100%] rounded-xl w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px] bg-white">
        <form action="" method="post" enctype="multipart/form-data"
            class="flex flex-col gap-4 overflow-y-auto h-full p-6 pb-20">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold">Edit Car</h2>
                <button type="button" id="closeEditForm"
                    class="close-btn bg-red-500 text-white font-extrabold px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                    X
                </button>
            </div>

            <input type="hidden" name="id_vehicle" value="<?php echo htmlspecialchars($car['id_vehicle'] ?? ''); ?>">

            <div class="form-group flex flex-col">
                <label for="category" class="text-sm text-gray-700 mb-1">Category</label>
                <select name="category" id="category"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                    <?php
                    // try {
                    //     $category = new Category(null, null, null);
                    //     $resultCat = $category->ShowCategory();

                    //     if ($resultCat) {
                    //         foreach ($resultCat as $cat) {
                    //             $selected = isset($car['category']) && $cat['id_category'] == $car['category'] ? 'selected' : '';
                    //             echo '<option value="' . htmlspecialchars($cat['id_category']) . '" ' . $selected . '>' . htmlspecialchars($cat['name']) . '</option>';
                    //         }
                    //     } else {
                    //         echo '<option value="">No categories found</option>';
                    //     }
                    // } catch (\PDOException $e) {
                    //     echo "Error showing Category: " . $e->getMessage();
                    // }
                    ?>
                </select>
            </div>

            <div class="form-group flex flex-col">
                <label for="model" class="text-sm text-gray-700 mb-1">Model</label>
                <input name="model" type="text" id="model" value="<?php echo htmlspecialchars($car['model'] ?? ''); ?>"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
            </div>

            <div class="form-group flex flex-col">
                <label for="price_day" class="text-sm text-gray-700 mb-1">Price/day</label>
                <input type="number" id="price_day" name="price_day"
                    value="<?php echo htmlspecialchars($car['price_per_day'] ?? ''); ?>"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
            </div>

            <!-- Continue with similar pattern for other fields -->
            <div class="form-group flex flex-col">
                <label for="mileage" class="text-sm text-gray-700 mb-1">Mileage</label>
                <input type="number" name="mileage" id="mileage"
                    value="<?php echo htmlspecialchars($car['mileage'] ?? ''); ?>"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm" required>
            </div>

            <div class="form-group flex flex-col">
                <label for="imageVeh" class="text-sm text-gray-700 mb-1">Vehicle Image</label>
                <input type="file" name="imageVeh" id="imageVeh" accept="image/*"
                    class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
                <p class="text-sm text-gray-500 mt-1">Leave empty to keep the current image.</p>
            </div>

            <button type="submit"
                class="submit-btn bg-green-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out"
                name="submit">Save Changes</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttonsEdit = document.querySelectorAll('.buttonedit');
            const editForm = document.getElementById('editCarForm');
            const closeEditForm = document.getElementById('closeEditForm');

            if (editForm) {
                buttonsEdit.forEach(button => {
                    button.addEventListener('click', function (e) {
                        e.preventDefault();

                        editForm.classList.remove('hidden');
                        editForm.style.right = "0";
                    });
                });

                if (closeEditForm) {
                    closeEditForm.addEventListener('click', () => {
                        editForm.style.right = "-100%";
                    });
                }
            } else {
                console.error('Edit form not found');
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showVehicleDetails(id) {
            fetch('view_vehicle.php?id=' + id)
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        title: 'Vehicle Details',
                        html: data,
                        icon: 'info',
                        showCloseButton: true,
                        confirmButtonText: 'Close'
                    });
                })
                .catch(error => {
                    console.error('Error fetching vehicle details:', error);
                });
        }
    </script>
    
   
    <script src=".././assets/main.js"></script>
</body>

</html>