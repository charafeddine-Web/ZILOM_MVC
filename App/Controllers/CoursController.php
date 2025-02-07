<?php
namespace App\Controllers;

//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 2)) {
//    header("Location: ../public/index.php");
//    exit;
//}

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\Cours;
use App\Models\Categorie;
use App\Models\CoursText;
use App\Models\CoursVideo;
use App\Models\CoursTags;
use App\Models\CourseFactory;

use http\Exception;

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

    public function  Addcours()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitcours'])) {
            if (!isset($_SESSION['id_user'])) {
                echo "Error: User not logged in.";
                exit;
            }
            $title = htmlspecialchars($_POST['titre']);
            $description = htmlspecialchars($_POST['description']);
            $type = htmlspecialchars($_POST['type']);
            $category_id = isset($_POST['categorie']) && is_numeric($_POST['categorie']) ? intval($_POST['categorie']) : null;
            if ($category_id === null) {
                echo "Erreur: Catégorie invalide.";
                exit;
            }
            $enseignant_id = $_SESSION['id_user'];
            $content = '';
            $tags = isset($_POST['tags']) ? $_POST['tags'] : [];

            if ($type === 'video' && isset($_FILES['contenuVideo']) && $_FILES['contenuVideo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = './uploads/videos/';
                if ($_FILES['contenuVideo']['error'] !== UPLOAD_ERR_OK) {
                    echo "File upload error: " . $_FILES['contenuVideo']['error'] . "<br>";
                    exit;
                }
                if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true)) {
                    echo "Error: Failed to create upload directory.";
                    exit;
                }
                $uploadFile = $uploadDir . basename($_FILES['contenuVideo']['name']);
                if (move_uploaded_file($_FILES['contenuVideo']['tmp_name'], $uploadFile)) {
                    $content = $uploadFile;
                } else {
                    echo "Error: Failed to move uploaded file.";
                    exit;
                }
            } elseif ($type === 'text') {
                if (empty($_POST['contenuText'])) {
                    echo "Error: No text content provided.";
                    exit;
                }
                $content = htmlspecialchars($_POST['contenuText']);
            }
            if (empty($content)) {
                echo "Error: Content is empty. Upload process failed.<br>";
                exit;
            }
            $course = CourseFactory::createCourse($type, $title, $description, $category_id, $enseignant_id, $content, $tags);
            if ($course->addCours()) {
                header("Location: /ZILOM_MVC/public/enseignant/cours/");
                exit;
            } else {
                echo "Failed to add course.";
            }
        }

    }
    public function  Deletecours()
    {
        if (isset($_GET['idCours'])) {
            $categoryId = $_GET['idCours'];
            $category =  Cours::deleteCours(  $categoryId);
            if ($category) {
                header('Location: ZILOM_MVC/public/');
                exit();
            } else {
                echo "Error deleting category.";
            }
        } else {
            echo "Categorie ID not provided.";
        }

    }
    public function  Updatecours()
    {

    }


}


