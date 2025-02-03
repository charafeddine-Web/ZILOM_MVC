<?php
require_once '../autoload.php'; 
use Classes\Enseignant;
use Classes\Admin;
session_start();

if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
    header("Location: ../index.php");
    exit;
}

try {
    $resultadmin =  Admin::ViewStatistic();

    
    //pour statistic
    $Enseignant = new Enseignant(null,null,null,null,null,null);
    $result = $Enseignant->showAllEnseignant();
    
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
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
    <li class="h-12 active bg-transparent ml-1.5 rounded-l-full p-1">
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
                        <li class="text-[#363949]"><a href="listContrat.php" class="active">Enseignants &npr;</a></li> 
                        <li class="text-[#363949]"><a href="statistic.php" >Cours &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php" >Categorys &npr;</a></li>
                        <li class="text-[#363949]"><a href="statistic.php">Tags &npr;</a></li>

                    </ul>

                </div>
                <a id="buttonadd" href="#"
                    class="report h-[36px] px-[16px] rounded-[36px] bg-[#1976D2] text-[#f6f6f6] flex items-center justify-center gap-[10px] font-medium">
                    <i class="fa-solid fa-car"></i>
                    <span>Add Enseignant</span>
                </a>
            </div>
            <!-- insights-->
            <ul class="insights grid grid-cols-[repeat(auto-fit,_minmax(240px,_1fr))] gap-[24px] mt-[36px]">
                
                   
                <li class="flex items-center gap-3 bg-gray-200">
                    <div class="enrolled-message bg-green-100 text-green-800 p-4 rounded-md shadow-md">
                        <p>Top 3 Enseignants! <strong class="font-bold text-black">
                            <?php echo isset($resultadmin['top_3_enseignants']) ? $resultadmin['top_3_enseignants'] : "No data available."; ?>
                        </strong></p>
                    </div>
                </li>
                

            </ul>
            <!---- data content ---->
            <div class="bottom-data flex flex-wrap gap-[24px] mt-[24px] w-full">
    <div class="orders flex-grow flex-[1_0_500px]">
        <div class="header flex items-center gap-[16px] mb-[24px]">
            <i class='bx bx-list-check'></i>
            <h3 class="mr-auto text-[24px] font-semibold">List Enseignants</h3>
            <i class='bx bx-filter'></i>
            <i class='bx bx-search'></i>
        </div>
        <!--- tables---->
        <table class="w-full border-collapse">
                        <thead>
                            <tr class="">
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Registration ID</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Full Name</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Email </th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Date Inscription</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">is Active</th>
                                <th class="pb-3 px-3 text-sm text-left border-b border-grey">Status</th>
                                <th class="pb-3 px-5 text-sm text-left border-b border-grey">Action</th>
                            </tr>
                        </thead>
                        <tbody>
            <?php
                try {
                    
                    if (isset($result) && is_array($result)) {
                        foreach ($result as $r) {
                            echo "<tr class='hover:bg-gray-100 transition-all duration-300'>";
                            echo '<td class="border p-4 text-center text-sm font-medium text-gray-700">' . htmlspecialchars($r['idUser']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['nom']) . ' ' . htmlspecialchars($r['prenom']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['email']) . '</td>';
                            echo '<td class="border p-4 text-center text-sm text-gray-700">' . htmlspecialchars($r['date_creation']) . '</td>';
                            $statusClass = $r['status'] === 'active' 
                            ? 'bg-green-200 text-green-800' 
                            : 'bg-red-200 text-red-800';
                            echo '<td class="border p-4 text-center text-sm font-medium">';
                            echo '<span class="px-3 py-1 rounded-full ' . $statusClass . '">'
                            . htmlspecialchars(ucfirst($r['status'])) . '</span>';
                            echo '</td>';
                            switch ($r['status_enseignant']) {
                                case 'accepter':
                                    $status_class = 'bg-green-200 text-green-800';
                                    break;
                                case 'en_attente':
                                    $status_class = 'bg-yellow-200 text-yellow-800';
                                    break;
                                case 'refuser':
                                    $status_class = 'bg-red-200 text-red-800';
                                    break;
                                default:
                                    $status_class = 'bg-gray-200 text-gray-800'; 
                                    break;
                            }
                            echo '<td class="border p-4 text-center text-sm font-medium">';
                            echo '<span class="px-3 py-1 rounded-full ' . $status_class . '">';
                            echo htmlspecialchars(ucfirst($r['status_enseignant']));
                            echo '</span>';
                            echo '</td>';

                            
                            echo '<td class="border p-4 text-center flex justify-center items-center space-x-2">';
                            echo '<a href="crud/refuser_enseig.php?idUser=' . $r['idUser'] . '&idRole=' . $r['idRole'] . '" 
                                class="bg-red-100 text-red-500 hover:bg-red-200 p-2 rounded-full transition-all duration-300" title="Ban User">
                                <i class="fas fa-ban"></i></a>';
                            echo '<a href="crud/accepter_ensgienant.php?idUser=' . $r['idUser'] . '&idRole=' . $r['idRole'] . '" 
                                class="bg-green-100 text-green-500 hover:bg-green-200 p-2 rounded-full transition-all duration-300" title="Activate User">
                                <i class="fas fa-check"></i></a>';
                            echo '</td>';
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center p-2'>No Client available.</td></tr>";
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

    


    <!-- Edit Car Form -->
    
   
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