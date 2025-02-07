<?php
namespace App\Controllers;

//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 1)) {
//    header("Location: /ZILOM_MVC/public/admin/index");
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
        $result = Tag::showstatic();
        $tags = Tag::GetTags();
        require_once __DIR__ . '/../Views/admin/listTags.php';
    }

    public  function banneuser  ()
    {
        try {
            $idUser = $_GET['idUser'] ?? null;
            $idRole = $_GET['idRole'] ?? null;

            if (!$idUser || !$idRole) {
                throw new Exception("User ID and Role ID are required.");
            }

            if( $idRole == 3){
                $userInstance = new Admin($idUser, null, null, null, null,null);
                $userInstance->bannerUser();
                header('Location: /ZILOM_MVC/public/admin/listetudient');
                exit;
            }

        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function activieuser(){
        try {
            $idUser = $_GET['idUser'] ?? null;
            $idRole = $_GET['idRole'] ?? null;

            if (!$idUser || !$idRole) {
                throw new Exception("User ID and Role ID are required.");
            }
            if( $idRole == 3){
                $userInstance = new Admin($idUser, null, null, null, null,null);
                $userInstance->ActivieUser();
                header('Location: /ZILOM_MVC/public/admin/listetudient');
                exit;
            }

        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public  function accepterenseignant()
    {
        try {
            $idUser = $_GET['idUser'] ?? null;
            $idRole = $_GET['idRole'] ?? null;

            if (!$idUser || !$idRole) {
                throw new Exception("User ID and Role ID are required.");
            }
            if( $idRole == 2){
                $userInstance = new Admin(null, null, null, null, null,null);
                $userInstance->accepterEnseig($idUser);
                header('Location: /ZILOM_MVC/public/admin/listenseignant');
                exit;
            }

        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function refuserenseignant()
    {
        try {
            $idUser = $_GET['idUser'] ?? null;
            $idRole = $_GET['idRole'] ?? null;

            if( $idRole == 2){
                $userInstance = new Admin(null, null, null, null, null,null);
                $userInstance->refuserEnseig($idUser);
                header('Location: /ZILOM_MVC/public/admin/listenseignant');
                exit;
            }

        } catch (\PDOException $e) {
            echo "Database Error: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }



}
