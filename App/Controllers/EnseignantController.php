<?php
namespace App\Controllers;

//session_start();
//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 2)) {
//    header("Location: ../public/index.php");
//    exit;
//}

require_once __DIR__ . '/../../assets/vendors/autoload.php';

//use App\Models\Admin;

class EnseignantController
{
    public function index()
    {

        require_once __DIR__ . '/../Views/enseignant/......php';
    }
}
