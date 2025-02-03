<?php
require_once '../autoload.php';
use Classes\Cours;
if (isset($_GET['idCours'])) { 
    $categoryId = $_GET['idCours'];
    $category =  Cours::deleteCours(  $categoryId);
    if ($category) {
        header('Location: ./cours.php');
        exit();
    } else {
        echo "Error deleting category.";
    }
} else {
    echo "Category ID not provided.";
}
