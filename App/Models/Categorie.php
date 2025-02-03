<?php

namespace App\Models;
require_once __DIR__ . '/../../assets/vendors/autoload.php';
use App\Models\DatabaseConnection;

class Categorie
{
    private $idCategory;
    private $nom;
    private $description;
    private $imageCategory;

    public function __construct($idCategory = null, $nom, $description, $imageCategory)
    {
        $this->idCategory = $idCategory;
        $this->nom = $nom;
        $this->description = $description;
        $this->imageCategory = $imageCategory;
    }

    public function addCategory()
    {
        try {
            $pdo = DatabaseConnection::getInstance();
            $sql = "INSERT INTO categories (nom, description, imageCategy) VALUES (:nom, :description, :imageCategory)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':imageCategory', $this->imageCategory);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error adding category: " . $e->getMessage();
            return false;
        }
    }

    public function updateCategory($id, $nom, $description,$imageCategy)
    {
        try {
            $pdo = DatabaseConnection::getInstance();
            $sql = "UPDATE categories SET nom = :nom, description = :description , imageCategy = :imageCategy WHERE idCategory = :idCategory";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCategory', $id );
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':imageCategy', $imageCategy);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error updating category: " . $e->getMessage();
            return false;
        }
    }

    public function deleteCategory($category_id)
    {
        try {
            $pdo = DatabaseConnection::getInstance();
            $sql = "DELETE FROM categories WHERE idCategory = :idCategory";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCategory', $category_id, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            echo "Error deleting category: " . $e->getMessage();
            return false;
        }
    }

    public static function showCategories()
    {
        try {
            $pdo = DatabaseConnection::getInstance();
            $sql = "SELECT *FROM categories";
            $stmt = $pdo->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error showing categories: " . $e->getMessage();
            return false;
        }
    }

    public static function showDetails($idCategory)
    {
        try {
            $pdo = DatabaseConnection::getInstance();
            $sql = "SELECT * FROM categories WHERE idCategory = :idCategory";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':idCategory', $idCategory, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            echo "Error showing category details: " . $e->getMessage();
            return false;
        }
    }
}