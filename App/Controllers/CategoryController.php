<?php
namespace App\Controllers;

require_once __DIR__ . '/../../public/assets/vendors/autoload.php';
use App\Models\User;
use App\Models\Categorie;
use Exception;
class CategoryController
{


    public function addcategory(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addCategory'])) {
            $categoryName = $_POST['categoryName'];
            $categoryDescription = $_POST['categoryDescription'];

            if (isset($_FILES['categoryimage']) && $_FILES['categoryimage']['error'] == 0) {
                $categoryImage = $_FILES['categoryimage'];
            } else {
                echo "Please upload an image.";
                exit();
            }

            if (!empty($categoryName) && !empty($categoryDescription)) {
                try {
                    $targetDir = 'uploads/categories/';
                    if (!is_dir($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }

                    $imageExtension = pathinfo($categoryImage['name'], PATHINFO_EXTENSION);
                    $imageName = uniqid() . '.' . $imageExtension;
                    $targetFile = $targetDir . $imageName;
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

                    if (!in_array(strtolower($imageExtension), $allowedExtensions)) {
                        throw new Exception('Invalid image type. Allowed types are: JPG, JPEG, PNG, GIF.');
                    }

                    if (!move_uploaded_file($categoryImage['tmp_name'], $targetFile)) {
                        throw new Exception('Failed to upload the image.');
                    }
                    $category = new Categorie(null, $categoryName, $categoryDescription, $targetFile);
                    $category->addCategory();
                    header('Location: /ZILOM_MVC/public/admin/listcategory');
                    exit();
                } catch (Exception $e) {
                    echo 'Error adding category: ' . $e->getMessage();
                }
            } else {
                echo 'Please fill in all fields and upload an image.';
            }
        }
    }
    public function deletecategory(){
        if (isset($_GET['idCategory'])) {
            $categoryId = $_GET['idCategory'];
            $category = new Categorie(null, null, null, null);
            if ($category->deleteCategory($categoryId)) {
                header('Location: /ZILOM_MVC/public/admin/listcategory');
                exit();
            } else {
                echo "Error deleting category.";
            }
        } else {
            echo "Category ID not provided.";
        }

    }
}