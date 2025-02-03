<?php
require_once '../autoload.php';
use Classes\Etudiant;
use Classes\Enseignant;

session_start();

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
        header('Location: ./register.php');
        exit();
    }

    if ($role === 'Etudiant') {
        $user = new Etudiant(null, $nom, $prenom, $email, $password);
        $user->setIdRole(3);
    } elseif ($role === 'Enseignant') {
        $user = new Enseignant(null, $nom, $prenom, $email, $password);
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
        header('Location: ./register.php');
        exit();
    }
}
