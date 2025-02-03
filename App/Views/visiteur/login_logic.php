<?php
require_once '../autoload.php'; 
use Classes\User;
session_start();

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
        header('Location: ./login.php');  
        exit();
    }

    $user = User::login($email, $password);

    if (is_array($user)) {
        
        if ($user['status'] === 'suspended') {
            $error_message[] = "Votre compte est suspendu. Veuillez contacter l'administrateur.";
            $_SESSION['error_message'] = $error_message; 
            header('Location: ./login.php');
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
        header('Location: ./login.php');  
        exit();
    }
}
