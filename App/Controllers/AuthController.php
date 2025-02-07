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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submitlogin'])) {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
                $_SESSION['error_message'] = ["Invalid CSRF token."];
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }

            $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
            $password = trim(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));

            if (empty($email) || empty($password)) {
                $_SESSION['error_message'] = ["Veuillez remplir tous les champs."];
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }

            $user = User::login($email, $password);

            if (is_array($user)) {
                if ($user['status'] === 'suspended') {
                    $_SESSION['error_message'] = ["Votre compte est suspendu. Veuillez contacter l'administrateur."];
                    header('Location: /ZILOM_MVC/public/login');
                    exit();
                }

                $_SESSION['user'] = $user;
                $_SESSION['id_user'] = $user['iduser'];
                $_SESSION['id_role'] = $user['idrole'];
                $_SESSION['fullname'] = $user['nom'].' '.$user['prenom'];

                // REDIRECT BASED ON ROLE
                switch ($_SESSION['id_role']) {
                    case 2:
                        header("Location: /ZILOM_MVC/public/enseignant/indexEns");
                        break;
                    case 3:
                        header("Location: /ZILOM_MVC/public/etudient/indexEtu");
                        break;
                    case 1:
                        header("Location: /ZILOM_MVC/public/admin/index");
                        break;
                    default:
                        header('Location: /ZILOM_MVC/public/login');
                        break;
                }
                exit();
            } else {
                $_SESSION['error_message'] = ["Email ou mot de passe incorrect."];
                header('Location: /ZILOM_MVC/public/login');
                exit();
            }

            // Unset CSRF token after successful login
            unset($_SESSION['csrf_token']);
        }
    }

    public function register(){

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitregister'])) {

            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $error_message[] = "Invalid CSRF token";
            }
            $error_message = [];
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = trim(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));
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
                header('Location: /ZILOM_MVC/public/register');
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
                    header("Location: /ZILOM_MVC/public/etudient/indexEtu");
                    exit();
                } elseif ($user->getIdRole() == 2) {
                    header("Location: /ZILOM_MVC/public/enseignant/indexEns");
                    exit();                }
                exit();
            }else {
                $error_message[] = "Registration failed. Please try again.";
                $_SESSION['error_message'] = $error_message;
                header('Location: /ZILOM_MVC/public/register');
                exit();
            }

            unset($_SESSION['csrf_token']);

        }
    }

    public function register_pg()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : [];
        $success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : [];
        unset($_SESSION['error_message']);
        unset($_SESSION['success_message']);

        require_once __DIR__ . '/../../App/Views/visiteur/register.php';
    }
    public function login_pg(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

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