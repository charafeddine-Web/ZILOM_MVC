<?php

namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';
use App\Models\DatabaseConnection;
use PDO;
class Tag
{
    private $idTag;
    private $nom;

    public function __construct($idTag = null, $nom = null) {
        $this->idTag = $idTag;
        $this->nom = $nom;
    }

    public function AddTag( ) {
        $pdo = DatabaseConnection::getInstance();
        try {
            $sql = "INSERT INTO tags (nom) VALUES (:nom)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public static function GetTags() {
        $pdo = DatabaseConnection::getInstance();
        try {
            $sql = "SELECT *  FROM tags ";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public static function showstatic() {
        $pdo = DatabaseConnection::getInstance();
        try {
            $sql = "SELECT count(*) as count_tags FROM tags ";
            $stmt = $pdo->query($sql);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            } else {
                return [
                    'count_tags' => 0
                ];
            }        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    public static function GetTagById($idTag) {
        $pdo = DatabaseConnection::getInstance();
        try {
            $sql = "SELECT * FROM tags WHERE idTag = :idTag";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idTag", $idTag, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function UpdateTag() {
        $pdo = DatabaseConnection::getInstance();
        try {
            $sql = "UPDATE tags SET nom = :nom WHERE idTag = :idTag";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nom", $this->nom, PDO::PARAM_STR);
            $stmt->bindParam(":idTag", $this->idTag, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function DeleteTag() {
        $pdo = DatabaseConnection::getInstance();
        try {
            $sql = "DELETE FROM tags WHERE idTag = :idTag";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":idTag", $this->idTag, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getIdTag() {
        return $this->idTag;
    }

    public function setIdTag($idTag) {
        $this->idTag = $idTag;
    }

    public function getnom() {
        return $this->nom;
    }

    public function setnom($nom) {
        $this->nom = $nom;
    }
}