<?php
require_once '../autoload.php';
use Classes\Category;
use Classes\Tag;
session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submittags'])) {
    $tags = explode(',', $_POST['tags']);
    try {
        foreach ($tags as $tag) {
            $tag = trim($tag); 
            if (!empty($tag)) {
                $tag = new Tag(null, $tag);
                $tag->AddTag();
            }
        }
    } catch (\PDOException $e) {
        echo "Error Adding Tags: " . $e->getMessage();
    }
}

$result = Tag::showstatic();



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
    <style>
     
        /**just pour les tag */
        .tag {
            background-color: #e5f4ff;
            color: #007bff;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 5px;
            display: flex;
            align-items: center;
        }

        .tag span {
            cursor: pointer;
            margin-left: 5px;
            font-weight: bold;
        }

        .liked {
            color: red;
        }

    </style>
</head>

<body class="">
    <div class=" fixed top-0 left-0  w-[230px] h-[100%] z-50 overflow-hidden sidebar ">
    <a href="./index.php" class="logo text-xl font-bold h-[56px] flex items-center text-[#1976D2] z-30 pb-[20px] pl-8 box-content">
        <img src="../assets/images/resources/logo-1.png" alt="" />
        </a>
        <ul class="side-menu w-full mt-12">
    <li class=" h-12 bg-transparent ml-2.5 rounded-l-full p-1">
        <a href="index.php">
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
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCours.php">
            <i class="fa-solid fa-book-open"></i> Cours
        </a>
    </li>
    <li class="h-12 bg-transparent ml-1.5 rounded-l-full p-1">
        <a href="listCategory.php">
            <i class="fa-solid fa-layer-group"></i> Catégories
        </a>
    </li>
    <li class="h-12 active bg-transparent ml-1.5 rounded-l-full p-1">
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
                        <li class="text-[#363949]"><a href="listContrat.php" >Enseignants &npr;</a></li> 
                        <li class="text-[#363949]"><a href="statistic.php" >Cours &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php" >Categorys &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php" class="active">Tags &npr;</a></li>

                    </ul>

                </div>
                <a id="openAddTagsForm" href="#"
                    class="  report h-[36px] px-[16px] rounded-[36px] bg-[#1976D2] text-[#f6f6f6] flex items-center justify-center gap-[10px] font-medium">
                    <i class="fa-solid fa-car"></i>
                    <span>Add Tags</span>
                </a>
            </div>
            <!-- insights-->
            <ul class="insights grid grid-cols-[repeat(auto-fit,_minmax(240px,_1fr))] gap-[24px] mt-[36px]">
                <!-- <li>
                    <i class="fa-solid fa-user-group"></i>
                    <span class="info">
                        <h3>
                            <?php
                            // echo $result['total_clients'];
                            ?>
                        </h3>
                        <p>All Vehicles </p>
                    </span>
                </li> -->
                <li>
                    <i class="fa-solid fa-tags"></i> 
                    <span class="info">
                        <h3>
                            <?php
                            echo isset($result['count_tags']) ? $result['count_tags'] : "No data available.";
                            ?>
                        </h3>
                        <p>Total Tags</p>
                    </span>
                </li>

                

            </ul>
            <!---- data content ---->
            <div class="bottom-data flex flex-wrap gap-[24px] mt-[24px] w-full">
            <div class="orders flex-grow flex-[1_0_500px]">
            <div class="header flex items-center gap-[16px] mb-[24px]">
            <i class='bx bx-list-check'></i>
            <h3 class="mr-auto text-[24px] font-semibold">List Tags</h3>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
        </div>
        <!--- tables---->
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Registration number</th>
                    <th class="pb-3 px-3 text-sm text-left border-b border-grey">Nom</th>
                    <th class="pb-3 px-5 text-sm text-left border-b border-grey">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $tags = Tag::GetTags();

                    if ($tags) {
                        foreach ($tags as $tg) {
                          
                            echo "<tr class='hover:bg-gray-50 transition-all duration-300'>";
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($tg['idTag']) . '</td>';
                            echo '<td class="border p-4 text-sm text-gray-700">' . htmlspecialchars($tg['nom']) . '</td>';
                            echo '<td class="border p-4 flex space-x-2">';
                            echo '<a href="./crud/delete_tag.php?idTag=' . $tg['idTag'] . '" class="text-red-600 hover:text-red-800 font-semibold" onclick="return confirm(\'Are you sure you want to delete this Tag?\')">Delete</a>';
                            echo '|';
                            echo '<a href="javascript:void(0);" class="text-green-600 hover:text-green-800 font-semibold" onclick="showTagDetails(' . $tg['idTag'] . ')">View</a>';
                            echo '</td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center p-4 text-gray-500'>No Tags available.</td></tr>";
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
    <div id="addTagsForm"
    class="add-tags-form fixed right-[-100%] rounded-xl w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px] bg-white">
    <form action="listTags.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 overflow-y-auto h-full p-6 pb-20" id="tagsForm">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Add Tags</h2>
            <button type="button" id="closeTagsForm"
                class="close-btn bg-red-500 text-white font-extrabold px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                X
            </button>
        </div>

        <div id="tagsSections">
            <div class="tags-section border-b-2 pb-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">Tag Details</h3>
                <div class="mb-6">
                    <div id="tags-container" class="flex flex-wrap items-center p-2 border border-gray-300 rounded-md">
                        <input type="text" id="tag-input" placeholder="Add a tag" 
                            class="flex-grow p-2 outline-none text-sm text-gray-700">
                    </div>
                    <input type="hidden" name="tags" id="tags-hidden">
                    <p class="text-xs text-gray-500 mt-2">Press Enter or type a comma to add a tag.</p>
                </div>
            </div>
        </div>            
        <button type="submit"
            class="submit-btn bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out mt-4"
            name="submittags">Submit Tags</button>
    </form>
</div>

<div id="editTagsForm"
    class="edit-tags-form fixed right-[-100%] rounded-xl w-full max-w-[400px] h-[580px] shadow-[2px_0_10px_rgba(0,0,0,0.1)] flex flex-col gap-5 transition-all duration-700 ease-in-out z-50 top-[166px] bg-white">
    <form action="editTags.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 overflow-y-auto h-full p-6 pb-20" id="tagsForm">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Edit Tags</h2>
            <button type="button" id="closeEditTagsForm"
                class="close-btn bg-red-500 text-white font-extrabold px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out">
                X
            </button>
        </div>

        <div id="tagsSections">
            <div class="tags-section border-b-2 pb-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">Tag Details</h3>
                <div class="mb-6">
                    <div id="tags-container" class="flex flex-wrap items-center p-2 border border-gray-300 rounded-md">
                        <input type="text" id="tag-input" placeholder="Add or Edit a tag" 
                            class="flex-grow p-2 outline-none text-sm text-gray-700">
                    </div>
                    <input type="hidden" name="tags" id="tags-hidden">
                    <p class="text-xs text-gray-500 mt-2">Press Enter or type a comma to add a tag.</p>
                    <div id="tags-list" class="mt-4"></div>
                </div>
            </div>
        </div>

        <button type="submit"
            class="submit-btn bg-blue-500 text-white px-4 py-2 rounded-lg cursor-pointer transition-all duration-500 ease-in-out mt-4"
            name="submitedit">Submit Edited Tags</button>
    </form>
</div>


<script>
    /**
     * pour show model tags
     */
const addTagsForm = document.getElementById('addTagsForm');
const closeTagsForm = document.getElementById('closeTagsForm');
function showTagsForm() {
    addTagsForm.style.right = '0';  
    addTagsForm.style.top = '20%';  
}
function hideTagsForm() {
    addTagsForm.style.right = '-100%'; 
}
closeTagsForm.addEventListener('click', hideTagsForm);
document.getElementById('openAddTagsForm').addEventListener('click', showTagsForm);


    /**
     * pour add les multi tags en meme temps
     */
const tagInput = document.getElementById('tag-input');
const tagsContainer = document.getElementById('tags-container');
const tagsHidden = document.getElementById('tags-hidden');
let tags = [];

tagInput.addEventListener('keydown', function (event) {
    const tag = tagInput.value.trim();

    if (event.key === 'Enter' || event.key === ',' || event.key === ' ') {
        event.preventDefault(); 
        
        if (tag && !tags.includes(tag)) {
            tags.push(tag); 
            updateTags();    
        }

        tagInput.value = ''; 
        tagInput.focus();   
    }
});

function updateTags() {
    tagsContainer.innerHTML = '';
        tags.forEach(tag => {
        const tagElement = document.createElement('div');
        tagElement.className = 'tag';
        tagElement.innerHTML = `${tag} <span onclick="removeTag('${tag}')">&times;</span>`;
        tagsContainer.appendChild(tagElement);
    });

    tagsContainer.appendChild(tagInput);
    tagsHidden.value = tags.join(',');
}

function removeTag(tag) {
    tags = tags.filter(t => t !== tag);
   updateTags();
}

</script>
    <!-- Edit Car Form -->
    <?php
    if (isset($_GET['idTag'])) {
        $idTag = $_GET['idTag'];
        try {
            $car = Tag::GetTagById($idTag);

        } catch (\PDOException $e) {
            echo '<p class="text-red-500">Error fetching vehicle details: ' . $e->getMessage() . '</p>';
        }
    }


    ?>
    
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
        function showTagDetails(id) {
            fetch('view_tags.php?idTag=' + id)
                .then(response => response.text())
                .then(data => {
                    Swal.fire({
                        title: 'Tag Details',
                        html: data,
                        icon: 'info',
                        showCloseButton: true,
                        confirmButtonText: 'Close'
                    });
                })
                .catch(error => {
                    console.error('Error fetching Tag details:', error);
                });
        }
    </script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const vehicleSections = document.getElementById('vehicleSections');
            const addVehicleButton = document.getElementById('addVehicle');
            const removeVehicleButton = document.getElementById('removeVehicle');

            addVehicleButton.addEventListener('click', () => {
                const newSection = vehicleSections.firstElementChild.cloneNode(true);
                vehicleSections.appendChild(newSection);
            });

            removeVehicleButton.addEventListener('click', () => {
                if (vehicleSections.children.length > 1) {
                    vehicleSections.lastElementChild.remove();
                }
            });
        });
    </script>
    

    <script src=".././assets/main.js"></script>
</body>

</html>