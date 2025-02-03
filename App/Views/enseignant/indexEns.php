<?php
session_start();
require_once '../autoload.php';

use Classes\Enseignant;
use Classes\Inscription;
use Classes\Cours_Text;
use Classes\Cours;

if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 2)) {
    header("Location: ../index.php");
    exit;
}
if(isset($_SESSION['id_user'])){
  $teacherId=$_SESSION['id_user'];
  $teacherfullname=$_SESSION['fullname'];
}
//pour statisitiqe 
$statistiques=  Cours::staticCours($teacherId);
//pour table des inscriptioins
$inscription= new Inscription();
$inscriptions = $inscription->getInscriptionsByTeacher($teacherId); 

$enseignant = new Enseignant($_SESSION['id_user'], null, null, null, null);
if (!$enseignant->validateStatus()) {
  echo '
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          Swal.fire({
              title: "<span style=\'font-size: 24px; color: #4c6ef5;\'>Account Under Review</span>",
              html: `
                  <div style="display: flex; align-items: center; gap: 20px;">
                      <i class="fas fa-clock" style="font-size: 40px; color: #4c6ef5;"></i>
                      <p style="font-size: 18px; color: #333333;">Your account is under review. Please wait for approval before accessing this page.</p>
                  </div>
              `,
              icon: "info",
              background: "#f1f5f9",
              confirmButtonText: "Go to Homepage",
              confirmButtonColor: "#4c6ef5",
              showCloseButton: true,
              allowOutsideClick: false,
              customClass: {
                  popup: "swal-popup-large",
                  confirmButton: "swal-confirm-btn",
              },
              padding: "20px",
              width: "600px",
              heightAuto: true,
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "../index.php"; 
              }
          });
      });
  </script>
  ';
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
    <title>index - Page</title>
    
</head>
<body>
<div class="min-h-screen bg-gray-50/50">
  <!-- Sidebar -->
  <aside class="bg-gradient-to-br from-gray-800 to-gray-900 fixed inset-y-0 left-0 transform -translate-x-full xl:translate-x-0 transition-transform duration-300 w-64 z-50 p-4 xl:w-72">
    <div class="flex justify-between items-center border-b border-white/20 pb-4">
    <a href="#"><img src="../assets/images/resources/logo-2.png" alt="" /></a>
      <button class="xl:hidden text-white focus:outline-none" id="sidebarToggle">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <nav class="mt-6">
      <ul class="space-y-2">
       
        <li>
          <a href="indexEns.php" class="flex items-center gap-4 py-2 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md">
          <i class="fas fa-tachometer-alt text-sm"></i>
          <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="etudient.php" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            <i class="fas fa-users text-sm"></i>
            <span>Étudiants</span>
          </a>
        </li>
        <li>
          <a href="cours.php" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            <i class="fas fa-book text-sm"></i>
            <span>Cours</span>
          </a>
        </li>
       
      </ul>
      <div class="mt-8">
        <p class="text-sm uppercase text-gray-400 mb-4">Auth Pages</p>
        <form action="../logout.php" method="POST">
        <button type="submit" name="submit"  class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-sign-out-alt text-sm"></i>
          <span>Log Out</span>
      </button>
        </form>
      </div>
    </nav>
  </aside>
  
  <!-- Main Content -->
  <div class="xl:ml-72 transition-all duration-300">
    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-white shadow-sm px-4 py-3">
      <button class="text-gray-800 focus:outline-none xl:hidden" id="menuOpen">
        <i class="fas fa-bars"></i>
      </button>
      <h2 class="text-gray-700 font-semibold">Home</h2>
      <div class="relative">
        <input type="text" placeholder="Search" class="border rounded-md pl-10 pr-4 py-2 text-gray-700 w-64">
        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
      </div>
    </nav>
    <!-- Content -->
    <div class="flex justify-between items-center mx-8">
        <div class="p-4">
        <div class="enrolled-message bg-green-100 text-green-800 p-4 rounded-md shadow-md">
                    <p>Welcome!  <strong class="font-bold text-black "><?= $teacherfullname ;?></strong> to Home</p>
                    <p class="text-gray-600">Manage your courses, students, and much more.</p>

        </div>
        </div>
        <div>
            <button class="p-2 bg-indigo-900 rounded-xl font-bold text-white">Rapport</button>
        </div>
     </div>
    <div class=" mx-8 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-3 mt-8">

<div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
  <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
      <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
    </svg>
  </div>
  <div class="p-4 text-right">
    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total Etudients</p>
    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
    <?php echo $statistiques['total_etudiants']; ?>

    </h4>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
    </p>
  </div>
</div>
<div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
  <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
      <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
    </svg>
  </div>
  <div class="p-4 text-right">
    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">New Etudients</p>
    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
    <?php echo $statistiques['nouveaux_etudiants']; ?>
    </h4>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
    </p>
  </div>
</div>
<div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
  <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
      <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
    </svg>
  </div>
  <div class="p-4 text-right">
    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Cours</p>
    <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">
    <?php echo $statistiques['total_cours']; ?>
    </h4>
  </div>
  <div class="border-t border-blue-gray-50 p-4">
    <p class="block antialiased font-sans text-base leading-relaxed font-normal text-blue-gray-600">
    </p>
  </div>
</div>
</div>
<section>
    <div class="p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Inscriptions</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-indigo-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Course Title</th>
                        <th class="py-3 px-6 text-left">Course Description</th>
                        <th class="py-3 px-6 text-left">Student</th>
                        <th class="py-3 px-6 text-left">Date of Inscription</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    if ($inscriptions):
                        foreach ($inscriptions as $index => $inscription):
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6"><?= $index + 1 ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars($inscription['course_title']) ?></td>
                        <td class="py-3 px-6"><?= htmlspecialchars(substr($inscription['course_description'], 0, 20)) ?><?= strlen($inscription['course_description']) > 20 ? '...' : '' ?>
                        </td>
                        <td class="py-3 px-6">
                            <?= htmlspecialchars($inscription['student_name']) ?>
                            <?= htmlspecialchars($inscription['student_surname']) ?>
                        </td>
                        <td class="py-3 px-6">
                            <?= date("d M Y", strtotime($inscription['date_inscription'])) ?>
                        </td>
                    </tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                    <tr>
                        <td colspan="5" class="py-6 text-center text-gray-500">No inscriptions found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

   
  </div>
</div>

<script>
  const sidebar = document.querySelector("aside");
  const menuOpen = document.getElementById("menuOpen");
  const sidebarToggle = document.getElementById("sidebarToggle");

  menuOpen.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
  });

  sidebarToggle.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
  });
</script>
</body>
</html>
