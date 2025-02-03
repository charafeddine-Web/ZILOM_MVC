<?php

namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use App\Models\DatabaseConnection;
use App\Models\Cours;

class CoursText extends  Cours
{
    private $contenu;

    public function __construct($titre, $description, $contenu , $categorie_id , $enseignant_id,$type,$tags)
    {
        parent::__construct($titre, $description, $categorie_id, $enseignant_id,$type,$tags);
        $this->contenu = $contenu;
    }


    public function addCours() {
        try {
            $pdo = DatabaseConnection::getInstance();

            // Begin the transaction
            $pdo->beginTransaction();

            $sql = "INSERT INTO cours (titre, description, contenu, categorie_id, enseignant_id, type) 
                    VALUES (:titre, :description, :contenu, :categorie_id, :enseignant_id, :type)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titre', $this->titre, \PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, \PDO::PARAM_STR);
            $stmt->bindParam(':contenu', $this->contenu, \PDO::PARAM_STR);
            $stmt->bindParam(':categorie_id', $this->categorie_id, \PDO::PARAM_INT);
            $stmt->bindParam(':enseignant_id', $this->enseignant_id);
            $stmt->bindParam(':type', $this->type, \PDO::PARAM_STR);

            if ($stmt->execute()) {
                $coursId = $pdo->lastInsertId();

                if (!empty($this->tags)) {
                    foreach ($this->tags as $tagId) {
                        $sql = "INSERT INTO cours_tags (cours_id, tag_id) VALUES (:cours_id, :tag_id)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':cours_id', $coursId, \PDO::PARAM_INT);
                        $stmt->bindParam(':tag_id', $tagId, \PDO::PARAM_INT);
                        $stmt->execute();
                    }
                }

                $pdo->commit();
                return true;
            } else {
                $pdo->rollBack();
                return false;
            }
        } catch (\PDOException $e) {
            $pdo->rollBack();
            echo "Error adding cours: " . $e->getMessage();
            return false;
        }
    }


    // public function getAllCourss()
    // {
    //     try {
    //         $pdo = DatabaseConnection::getInstance();
    //         $sql = "SELECT count(*) as res_cours_text FROM cours WHERE type = 'text' and enseignant_id= :enseignant_id";
    //         $stmt = $pdo->prepare($sql);
    //         $stmt->bindValue(":enseignant_id",$this->enseignant_id);
    //         $stmt = $pdo->prepare($sql);

    //         $stmt->execute();
    //         $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    //         if ($result) {
    //             return $result;
    //         } else {
    //             return [
    //                 'res_cours_text' => 0
    //             ];
    //         }
    //     } catch (\PDOException $e) {
    //         echo "Error fetching cours: " . $e->getMessage();
    //         return false;
    //     }
    // }
    public function getAllCours()
    {
        try {
            $pdo = DatabaseConnection::getInstance();
            $sql = "SELECT c.idCours,c.titre,c.description,c.type,ct.nom,ct.idCategory,c.date_creation FROM cours c 
            JOIN categories ct on ct.idCategory=c.categorie_id 
            WHERE type = 'text' and enseignant_id= :enseignant_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":enseignant_id",$this->enseignant_id);

            $stmt->execute();
            return $stmt->fetchAll();

        } catch (\PDOException $e) {
            echo "Error fetching cours: " . $e->getMessage();
            return false;
        }
    }



}