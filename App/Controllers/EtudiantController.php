<?php
namespace App\Controllers;

//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 3)) {
//    header("Location: ../public/index.php");
//    exit;
//}

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\Categorie;
use App\Models\Cours;
use App\Models\Inscription;


class EtudiantController
{
    public function index_etudiant()
    {
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $limit = 8;
        $courses = Cours::SearchCours($searchQuery, $page, $limit);
        $total_courses = Cours::getTotalCoursesserch($searchQuery);
        $total_pages = ceil($total_courses / $limit);

// Fetch categories
        $categories = Categorie::showCategories();
// Group courses by category
        $coursesByCategory = [];
        if ($courses && count($courses) > 0) {
            foreach ($courses as $course) {
                $coursesByCategory[$course['categorie_id']][] = $course;
            }
        }
        require_once __DIR__ . '/../../App/Views/etudiant/indexEtu.php';
    }

    public function mecours(){
        if (isset($_SESSION['id_user'])){
            $etudient=$_SESSION['id_user'];
        };
        $insecription = new Inscription();
        $mecours=$insecription->getAllInscriptionsEtudient($etudient);
        require_once __DIR__ . '/../Views/etudiant/mecours.php';
    }
    public function cours_details(){

        if (isset($_SESSION['id_user'])) {
            $etudient = $_SESSION['id_user'];
        }
        ;
        $courseId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($courseId <= 0) {
            echo "Invalid course ID.";
            exit;
        }

        $course = Cours::getCoursById($courseId);

        if (!$course) {
            echo "Course not found.";
            exit;
        }
        $instructorName = htmlspecialchars($course['enseignant_nom']);
        $categoryName = htmlspecialchars($course['categorie_nom']);
// pour teset si etudient inscrire sur une cours or no
        $inscription = new Inscription();
        $isEnrolled = $inscription->checkEnrollment($etudient, $courseId); //
    }
    public function inscriprion(){

        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $coursId = $_POST['cours_id'] ?? null;
            $etudiantId = $_POST['etudiant_id'] ?? null;

            if ($coursId && $etudiantId) {
                $inscription = new Inscription();
                $message = $inscription->inscrireEtudiant($coursId, $etudiantId);

                if ($message === "Inscription réussie!") {
                    echo json_encode(['success' => true, 'message' => $message]);
                } else {
                    echo json_encode(['success' => false, 'error' => $message]);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Invalid information.']);
            }
            exit;
        }
    }

}
