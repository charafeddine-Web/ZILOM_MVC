<?php
namespace App\Controllers;

session_start();
//if (!isset($_SESSION['id_user']) || (isset($_SESSION['id_role']) && $_SESSION['id_role'] !== 2)) {
//    header("Location: /ZILOM_MVC/public/");
//    exit;
//}

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\Ensiegnant;
use App\Models\Inscription;
use App\Models\Cours;
use App\Models\CoursText;
use App\Models\Categorie;
use App\Models\CoursVideo;
use App\Models\Tag;


class EnseignantController
{
    private function checkEtudiantSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['id_user']) || $_SESSION['id_role'] !== 2) {
            header("Location: /ZILOM_MVC/public/login");
            exit;
        }
    }
    public function index()
    {
        $this->checkEtudiantSession();

        if(isset($_SESSION['id_user'])){
            $teacherId=$_SESSION['id_user'];
            $teacherfullname=$_SESSION['fullname'];
        }

//pour statisitiqe
        $statistiques=  Cours::staticCours($teacherId);
//pour table des inscriptioins
        $inscription= new Inscription();
        $inscriptions = $inscription->getInscriptionsByTeacher($teacherId);

        $enseignant = new Ensiegnant($_SESSION['id_user'], null, null, null, null);
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
                  window.location.href = "/ZILOM_MVC/public/"; 
              }
          });
      });
  </script>
  ';
            exit;
        }
        require_once __DIR__ . '/../../App/Views/enseignant/indexEns.php';
    }

    public function  cours_ens()
    {
        $this->checkEtudiantSession();

        if(isset($_SESSION['id_user'])){
            $teacherId=$_SESSION['id_user'];
            $teacherfullname=$_SESSION['fullname'];
        }
        $enseignant = new Ensiegnant($_SESSION['id_user'], null, null, null, null);
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
                  window.location.href = "/ZILOM_MVC/public/"; 
              }
          });
      });
  </script>';
            exit;
        }

        //pour show category
        $category=new Categorie(null,null,null,null);
        $categories=$category->showCategories();

        $tag=new Tag(null,null);
        $tags=$tag->GetTags();

        //pour les cours type video
        $cours = new CoursVideo(null, null, null, $_SESSION['id_user'], null, null,null);
        $resultvideo = $cours->getAllCours();
        //pour les cours type Text
        $cours = new CoursText(null, null, null, null, $_SESSION['id_user'], null,null);
        $resulttext = $cours->getAllCours();

        require_once __DIR__ . '/../../App/Views/enseignant/cours.php';
    }


    public function  etudiant_ens()
    {
        $this->checkEtudiantSession();

        if(isset($_SESSION['id_user'])){
            $teacherId=$_SESSION['id_user'];
            $teacherfullname=$_SESSION['fullname'];
        }
        // Fetch the students enrolled in courses taught by a specific teacher
        $etudinscrire=new Inscription();
        $studentsInCourse = $etudinscrire->getStudentsByTeacher($teacherId);

        $enseignant = new Ensiegnant($_SESSION['id_user'], null, null, null, null);
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
        require_once __DIR__ . '/../../App/Views/enseignant/etudient.php';

    }


}
