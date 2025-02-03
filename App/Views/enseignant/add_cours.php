<?php
require_once '../autoload.php';
session_start();
use Classes\Cours_Text;
use Classes\Cours_Video;
use Classes\Cours_Tags; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitcours'])) {
    if (!isset($_SESSION['id_user'])) {
        echo "Error: User not logged in.";
        exit;
    }

    $title = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $type = htmlspecialchars($_POST['type']);
    $category_id = intval($_POST['categorie']);
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

    if ($type === 'video') {
        $course = new Cours_Video($title, $description, $category_id, $enseignant_id, $content, $type, $tags);
    } else {
        $course = new Cours_Text($title, $description, $content, $category_id, $enseignant_id, $type, $tags);
    }

    if ($course->addCours()) {

        header("Location: cours.php");
        exit;
    } else {
        echo "Failed to add course.";
    }
}
