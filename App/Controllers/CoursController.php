<?php
namespace App\Controllers;

session_start();
//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 2)) {
//    header("Location: ../public/index.php");
//    exit;
//}

require_once __DIR__ . '/../../assets/vendors/autoload.php';

use App\Models\Cours;
use App\Models\Categorie;
class CoursController
{
    public function index()
    {
        try {
            $cours = Cours::ShowCours();
            $topCourses = array_slice($cours, 0, 8);
            $categories = Categorie::showCategories();


        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
        require_once __DIR__ . '/../Views/index.php';
    }
}


