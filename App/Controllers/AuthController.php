<?php

namespace App\Controllers;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ensiegnant;


class AuthController
{
    public function login()
    {
        $success_message = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submitlogin'])) {
            $error_message = [];

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || empty($password)) {
                $error_message[] = "Veuillez remplir tous les champs.";
            }

            if (!empty($error_message)) {
                $_SESSION['error_message'] = $error_message;
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }

            $user = User::login($email, $password);

            if (is_array($user)) {

                if ($user['status'] === 'suspended') {
                    $error_message[] = "Votre compte est suspendu. Veuillez contacter l'administrateur.";
                    $_SESSION['error_message'] = $error_message;
                    header('Location: /ZILOM_MVC/public/login');
                    exit();
                }

                $_SESSION['user'] = $user;
                $_SESSION['id_user'] = $user['idUser'];
                $_SESSION['id_role'] = $user['idRole'];
                $_SESSION['fullname'] = $user['nom'].' '.$user['prenom'];

                if ($_SESSION['id_role'] == 2) {
                    header("Location: ../enseignant/indexEns.php");
                    exit();
                } elseif($_SESSION['id_role'] == 3) {
                    header("Location: ../etudient/indexEtu.php");
                    exit();
                }else {
                    header("Location: ../admin/index.php");
                    exit();
                }
            } else {
                $error_message[] = $user;
                $_SESSION['error_message'] = $error_message;
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }
        }
        require_once __DIR__ . '/../../App/Views/visiteur/login.php';

    }

    public function register(){

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitregister'])) {
            $error_message = [];

            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

            if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($role)) {
                $error_message[] = "All fields are required.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_message[] = "Invalid email format.";
            }

            if (strlen($password) < 8) {
                $error_message[] = "Password must be at least 8 characters long.";
            }

            if (!in_array($role, ['Etudiant', 'Enseignant'])) {
                $error_message[] = "Invalid role selected.";
            }

            if (!empty($error_message)) {
                $_SESSION['error_message'] = $error_message;
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }

            if ($role === 'Etudiant') {
                $user = new Etudiant(null, $nom, $prenom, $email, $password);
                $user->setIdRole(3);
            } elseif ($role === 'Enseignant') {
                $user = new Ensiegnant(null, $nom, $prenom, $email, $password);
                $user->setIdRole(2);    }

            if ($user->register()) {
                $_SESSION['id_user'] = $user->getIdUser();
                $_SESSION['fullname'] = "{$nom} {$prenom}";
                $_SESSION['id_role'] = $user->getIdRole();

                if ($user->getIdRole() == 3) {
                    header("Location: ../etudient/indexEtu.php");
                } elseif ($user->getIdRole() == 2) {
                    header("Location: ../enseignant/indexEns.php");
                }
                exit();
            } else {
                $error_message[] = "Registration failed. Please try again.";
                $_SESSION['error_message'] = $error_message;
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }
        }
    }

    public function register_pg()
    {
        $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : [];
        $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : [];
        unset($_SESSION['error_message']);
        unset($_SESSION['success_message']);

        require_once __DIR__ . '/../../App/Views/visiteur/register.php';
    }
    public function login_pg(){

        $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : [];
        $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : [];
        unset($_SESSION['error_message']);
        unset($_SESSION['success_message']);


        if (isset($_SESSION['id_user'])) {
            header("Location: /ZILOM_MVC/public/");
            exit;
        }
        require_once __DIR__ . '/../../App/Views/visiteur/login.php';
    }
    public function logout(){
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
            error_log("Logout triggered");
            User::logout();
            header('Location: /ZILOM_MVC/public/');
            exit();
        }
    }
}