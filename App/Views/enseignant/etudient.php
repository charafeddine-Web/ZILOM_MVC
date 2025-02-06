
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
          <a href="/ZILOM_MVC/public/enseignant/indexEns" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-tachometer-alt text-sm"></i>
          <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/ZILOM_MVC/public/enseignant/etudient" class="flex items-center gap-4 py-2 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md">
          <i class="fas fa-users text-sm"></i>
          <span>Étudiants</span>
          </a>
        </li>
        
        <li>
          <a href="/ZILOM_MVC/public/enseignant/cours" class="flex items-center gap-4 text-white py-2 px-4 rounded-lg hover:bg-gray-700">
            <i class="fas fa-book text-sm"></i>
            <span>Cours</span>
          </a>
        </li>
       
      </ul>
      <div class="mt-8">
        <p class="text-sm uppercase text-gray-400 mb-4">Auth Pages</p>
        <form action="/ZILOM_MVC/public/logout" method="POST">
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
                    <p >Welcome!  <strong class="font-bold text-black "><?= $teacherfullname ;?></strong> to Home</p>
                    <p class="text-gray-600">Manage your courses, students, and much more.</p>

        </div>       
       </div>
        <div>
            <button class="p-2 bg-indigo-900 rounded-xl font-bold text-white">Rapport</button>
        </div>
     </div>
     <section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold text-indigo-600 mb-6">Students Enrolled in Your Courses</h1>

        <?php
       
        if ($studentsInCourse && count($studentsInCourse) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($studentsInCourse as $student): ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800"><?= htmlspecialchars($student['student_name']) . ' ' . htmlspecialchars($student['student_surname']) ?></h2>
                            <p class="text-sm text-gray-500 mt-2">
                                Enrolled in: <span class="text-indigo-600"><?= htmlspecialchars($student['course_title']) ?></span>
                            </p>
                            <p class="text-sm text-gray-500 mt-1">
                                Description: <?= htmlspecialchars(substr($student['course_description'], 0, 50)) ?>...
                            </p>
                            <p class="text-sm text-gray-500 mt-1">
                                Enrollment Date: <?= htmlspecialchars(date('F d, Y', strtotime($student['date_inscription']))) ?>
                            </p>
                        </div>
                        <div class="bg-indigo-50 p-4 text-indigo-600 text-center">
                            <i class="fas fa-user-circle text-2xl"></i>
                            <span class="ml-2">Student</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-gray-500 text-center mt-8">No students have enrolled in your courses yet.</p>
        <?php endif; ?>
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
