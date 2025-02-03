<?php
require_once '../autoload.php';
use Classes\Categorie;
session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    
    if (isset($_FILES['categoryimage']) && $_FILES['categoryimage']['error'] == 0) {
        $categoryImage = $_FILES['categoryimage'];
    } else {
        echo "Please upload an image.";
        exit();
    }
    
    if (!empty($categoryName) && !empty($categoryDescription)) {
        try {
            $targetDir = 'uploads/categories/';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $imageExtension = pathinfo($categoryImage['name'], PATHINFO_EXTENSION);
            $imageName = uniqid() . '.' . $imageExtension;
            $targetFile = $targetDir . $imageName;
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array(strtolower($imageExtension), $allowedExtensions)) {
                throw new Exception('Invalid image type. Allowed types are: JPG, JPEG, PNG, GIF.');
            }

            if (!move_uploaded_file($categoryImage['tmp_name'], $targetFile)) {
                throw new Exception('Failed to upload the image.');
            }
            $category = new Categorie(null, $categoryName, $categoryDescription, $targetFile);
            $category->addCategory();
            header('Location: listCategory.php');
            exit();
        } catch (Exception $e) {
            echo 'Error adding category: ' . $e->getMessage();
        }
    } else {
        echo 'Please fill in all fields and upload an image.';
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href=".././assets/style.css">
    <script src=".././assets/tailwind.js"></script>
</head>

<body class="">
    <!-- Side Bar -->
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
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listEnseignants.php">
            <i class="fa-solid fa-chalkboard-teacher"></i> Enseignants
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCours.php">
            <i class="fa-solid fa-book-open"></i> Cours
        </a>
    </li>
    <li class="h-12 active bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCategory.php">
            <i class="fa-solid fa-layer-group"></i> Catégories
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
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
            <img class="w-[36px] h-[36px] object-cover rounded-full" width="36" height="36" src="../assets/charaf.png.jfif">

            </a>
        </nav>

        <!-- end nav -->
        <main class=" mainn w-full p-[36px_24px] max-h-[calc(100vh_-_56px)]">
            <div class="header flex items-center justify-between gap-[16px] flex-wrap">
                <div class="left">
                <ul class="breadcrumb flex items-center space-x-[16px]">
                        <li class="text-[#363949]"><a  href="listClients.php">
                                index &npr;
                            </a></li>
                        
                        <li class="text-[#363949]"><a href="listCars.php" >Etudients &npr;</a></li> 
                        <li class="text-[#363949]"><a href="listContrat.php">Enseignants &npr;</a></li> 
                        <li class="text-[#363949]"><a href="statistic.php">Cours &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php" class="active">Categorys &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php">Tags &npr;</a></li>

                    </ul>

                </div>
                <a id="buttonadd" href="#"
                    class=" report h-[36px] px-[16px] rounded-[36px] bg-[#1976D2] text-[#f6f6f6] flex items-center justify-center gap-[10px] font-medium">
                    <i class="fa-solid fa-car"></i>
                    <span>Add Category</span>
                </a>
            </div>
            <!-- insights-->
            <!-- <ul class="insights grid grid-cols-[repeat(auto-fit,_minmax(240px,_1fr))] gap-[24px] mt-[36px]">
                <li>
                    <i class="fa-solid fa-user-group"></i>
                    <span class="info">
                        <h3>
                            <?php
                            // echo $result['total_clients'];
                            ?>
                        </h3>
                        <p>Clients</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-car-side"></i>
                    <span class="info">
                        <h3>
                            <?php
                            // echo $resultv['total_voitures'];
                            ?>
                        </h3>
                        <p>Cars</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-file-signature"></i>
                    <span class="info">
                        <h3>
                            <?php
                            // echo $resultc['total_contrats'];
                            ?>
                        </h3>
                        <p>Contrats</p>
                    </span>
                </li>
            </ul> -->
            <!---- data content ---->
            <div class="bottom-data flex flex-wrap gap-[24px] mt-[24px] w-full ">
                <div class="orders  flex-grow flex-[1_0_500px]">
                    <div class="header  flex items-center gap-[16px] mb-[24px]">
                        <i class='bx bx-list-check'></i>
                        <h3 class="mr-auto text-[24px] font-semibold">List Category</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <!--- tables---->
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="">
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Registration ID</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Image</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Name</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Description </th>
                                <th class="pb-3 px-5 text-sm text-left border-b border-grey">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                            try {
                                $category = Categorie::showCategories();
                    
                                if ($category) {
                                    foreach ($category as $ct) {
                                        echo "<tr>";
                                        echo '<td class="border p-2">' . htmlspecialchars($ct['idCategory']) . '</td>';
                                        echo '<td class="border p-2"><img src="' . htmlspecialchars($ct['imageCategy']) . '" alt="Category Image" style="max-width: 100px; height: auto;" /></td>';
                                        echo '<td class="border p-2">' . htmlspecialchars($ct['nom']) . '</td>';
                                        echo '<td class="border p-2">' . htmlspecialchars($ct['description']) . '</td>';
                                        echo '<td class="border p-2 flex items-center justify-between">';
                                        echo '<a href="#" class="buttonedit text-blue-500 hover:text-blue-700" 
                                        data-id="' . $ct['idCategory'] . '" 
                                        data-name="' . htmlspecialchars($ct['nom']) . '" 
                                        data-description="' . htmlspecialchars($ct['description']) . '" 
                                        data-image="' . htmlspecialchars($ct['imageCategy']) . '">
                                        Edit
                                        </a>';
                                        echo '<a href="crud/delete_category.php?idCategory=' . $ct['idCategory'] . '" class="text-red-500 hover:text-red-700" onclick="return confirm(\'Are you sure you want to delete this category?\')">Delete</a>';
                                        echo '<a href="javascript:void(0);" class="text-green-500 hover:text-green-700" onclick="showCategoryDetails(' . $ct['idCategory'] . ')">View</a>';
                                        echo '</td>';
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center p-2'>No Category available.</td></tr>";
                                }
                            } catch (PDOException $e) {
                                echo "<tr><td colspan='8' class='text-center p-2 text-red-500'>Error: " . $e->getMessage() . "</td></tr>";
                            }
                            
                        
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <div id="addClientForm"
        class="add-client-form fixed rounded-xl right-[-100%] w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] p-6 flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px]">
        <form action="" method="post" class="flex flex-col gap-4" enctype="multipart/form-data">
        <h2 class="text-2xl font-semibold mb-5">Add Category</h2>

        <div class="form-group flex flex-col">
            <label for="categoryimage" class="text-sm text-gray-700 mb-1">Category Image</label>
            <input name="categoryimage" type="file" id="categoryimage" 
                class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
        </div>
        <div class="form-group flex flex-col">
            <label for="categoryName" class="text-sm text-gray-700 mb-1">Category Name</label>
            <input name="categoryName" type="text" id="categoryName" placeholder="Enter category name"
                class="p-2 border border-gray-300 rounded-lg outline-none text-sm">
        </div>
        <div class="form-group flex flex-col">
            <label for="categoryDescription" class="text-sm text-gray-700 mb-1">Category Description</label>
            <textarea name="categoryDescription" id="categoryDescription" rows="4" placeholder="Enter category description"
                class="p-2 border border-gray-300 rounded-lg outline-none text-sm"></textarea>
        </div>

        <button type="submit"
            class="submit-btn border-none px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out"
            name="addCategory">Add Category</button>
        <button type="button" id="closeForm"
            class="close-btn border-none px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">Close</button>
    </form>
    </div>

    <div id="editForm" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <form action="./crud/edit_category.php" method="post" enctype="multipart/form-data" id="editCategoryForm" class="flex flex-col gap-4">
            <h2 class="text-xl font-semibold mb-4">Edit Category</h2>
            
            <input type="hidden" name="idCategory" id="editCategoryId">

            <div>
                <label for="editCategoryName" class="text-sm font-medium">Category Name</label>
                <input type="text" name="categoryName" id="editCategoryName" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label for="editCategoryDescription" class="text-sm font-medium">Description</label>
                <textarea name="categoryDescription" id="editCategoryDescription" class="w-full p-2 border rounded" required></textarea>
            </div>

            <div>
                <label class="text-sm font-medium">Current Image</label>
                <img id="editCategoryImagePreview" class="mt-2 max-w-full h-auto">
                <input type="hidden" name="currentImage" id="currentImage">
            </div>

            <div>
                <label for="editCategoryImage" class="text-sm font-medium">Upload New Image</label>
                <input type="file" name="categoryImage" id="editCategoryImage" class="w-full p-2 border rounded">
            </div>

            <div class="flex gap-4">
                <button type="submit" name="editCategory" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
                <button type="button" id="closeEditForm" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
            </div>
        </form>
    </div>
</div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
         function showCategoryDetails(id) {
        fetch('view_category.php?id_category=' + id)
            .then(response => response.text())
            .then(data => {
                Swal.fire({
                    title: 'Category Details',
                    html: data, 
                    icon: 'info',
                    showCloseButton: true,
                    confirmButtonText: 'Close'
                });
            })
            .catch(error => {
                console.error('Error fetching Category details:', error);
            });
    }
//pour edit
    document.addEventListener('DOMContentLoaded', () => {
    const editLinks = document.querySelectorAll('.buttonedit');
    const editForm = document.getElementById('editForm');
    const editCategoryId = document.getElementById('editCategoryId');
    const editCategoryName = document.getElementById('editCategoryName');
    const editCategoryDescription = document.getElementById('editCategoryDescription');
    const editCategoryImagePreview = document.getElementById('editCategoryImagePreview');
    const currentImage = document.getElementById('currentImage');
    const closeEditForm = document.getElementById('closeEditForm');
    editLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const id = link.getAttribute('data-id');
            const name = link.getAttribute('data-name');
            const description = link.getAttribute('data-description');
            const image = link.getAttribute('data-image');
            editCategoryId.value = id;
            editCategoryName.value = name;
            editCategoryDescription.value = description;
            currentImage.value=image;
            editCategoryImagePreview.src = image;
            editForm.classList.remove('hidden');
        });
    });
    closeEditForm.addEventListener('click', () => {
        editForm.classList.add('hidden');
    });
});

</script>
        <script src=".././assets/main.js"></script>
    </body>

    </html>