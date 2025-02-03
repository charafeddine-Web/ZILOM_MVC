<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCours = intval($_POST['idCours']);
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $type = htmlspecialchars($_POST['type']);
    $categorie = intval($_POST['categorie']);

    try {
        $stmt = $pdo->prepare("UPDATE cours SET titre = ?, description = ?, type = ?, categorie_id = ? WHERE idCours = ?");
        $stmt->execute([$titre, $description, $type, $categorie, $idCours]);

        $_SESSION['success'] = "Course updated successfully.";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }

    header("Location: courses.php");
    exit();
}
?>
