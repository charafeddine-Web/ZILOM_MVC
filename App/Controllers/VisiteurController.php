<?php
namespace App\Controllers;

//session_start();
//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
//    header("Location: ../public/index.php");
//    exit;
//}

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\Cours;
use App\Models\Categorie;


class VisiteurController
{
    public function about()
    {
        require_once __DIR__ . '/../../App/Views/visiteur/about.php';
    }
    public function contact()
    {
        require_once __DIR__ . '/../../App/Views/visiteur/contact.php';
    }
    public function cours_details(){
        $courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($courseId <= 0) {
            echo "Invalid course ID.";
            exit;
        }
        $courseItem = Cours::getCoursById($courseId);
        if (!$courseItem) {
            echo "Course not found.";
            exit;
        }
        $instructorName = htmlspecialchars($courseItem['enseignant_nom']);
        $categoryName = htmlspecialchars($courseItem['categorie_nom']);
        $cours=Cours::ShowCours();
        $courses = array_slice($cours, 0, 4);
        require_once __DIR__ . '/../../App/Views/visiteur/course-details.php';
    }
    public function courses(){
            $cours= Cours::ShowCours();
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 8;
            $courses = Cours::ShowCours($currentPage, $limit);
            $totalCourses = Cours::getTotalCourses();
            $totalPages = ceil($totalCourses / $limit);
            $categories = Categorie::showCategories();
            require_once __DIR__ . '/../../App/Views/visiteur/courses.php';
    }
    public function news(){
        require_once __DIR__ . '/../../App/Views/visiteur/news.php';
    }
    public function news_details(){
        require_once __DIR__ . '/../../App/Views/visiteur/news-details.php';
    }
    public function teachers_1(){
        require_once __DIR__ . '/../../App/Views/visiteur/teachers-1.php';
    }

}
