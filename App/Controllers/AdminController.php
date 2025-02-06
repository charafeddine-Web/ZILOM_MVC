<?php
namespace App\Controllers;

//session_start();
//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
//    header("Location: ../public/index.php");
//    exit;
//}

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Cours;
use App\Models\Categorie;
use App\Models\Tag;
use App\Models\Ensiegnant;
use App\Models\Inscription;


use Exception;

class AdminController
{
    public function index()
    {
        try {
            $result = Admin::ViewStatistic();
            $cours = new Inscription();
            $res = $cours->getAllInscriptions();
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
        }
        require_once __DIR__ . '/../Views/admin/index.php';
    }
    public function listetudient(){

        try {

            //pour statistic
            $Etudiant = new Etudiant(null,null,null,null,null,null);
            $result = $Etudiant->showAllEtudiant();
            $static= $Etudiant->statistiqueEtudiants();


        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        require_once __DIR__ . '/../Views/admin/listEtudiants.php';

    }
    public function listenseignant(){

        try {
            $resultadmin =  Admin::ViewStatistic();

            //pour statistic
            $Enseignant = new Ensiegnant(null,null,null,null,null,null);
            $result = $Enseignant->showAllEnseignant();


        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        require_once __DIR__ . '/../Views/admin/listEnseignants.php';
    }
    public function listcourses(){
        $resultd =  Admin::ViewStatistic();
        $result =  Cours::ViewStatisticcours();
        $cours = Cours::ShowallCours();

        require_once __DIR__ . '/../Views/admin/listCours.php';
    }
    public function listcategory(){
        $category = Categorie::showCategories();
        require_once __DIR__ . '/../Views/admin/listCategory.php';

    }
    public function listtags(){

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
        $tags = Tag::GetTags();

        require_once __DIR__ . '/../Views/admin/listTags.php';

    }


}
