<?php
//session_start();
//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
//    header("Location: ../public/index.php");
//    exit;
//}
namespace App\Controllers;

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\Admin;
use Exception;

class AdminController
{
    public function index()
    {
        try {
            $result = Admin::ViewStatistic();
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
        require_once __DIR__ . '/../Views/admin/index.php';
    }
    public function listCategory(){

    }
    public function listCours(){

    }
    public function listEnseignants(){

    }
    public function listEtudiants(){

    }
    public function listTags(){

    }


}
