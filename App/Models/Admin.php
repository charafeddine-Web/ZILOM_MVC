<?php
namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';
use App\Models\User;
use App\Models\DatabaseConnection;
class Admin extends User{
    public static function ViewStatistic() {
        try {
            $pdo = DatabaseConnection::getInstance();
            $query = "
    SELECT 
        -- Total enseignants
        (SELECT COUNT(*) FROM users WHERE idRole = 2) AS total_enseignant,
        
        -- Total étudiants
        (SELECT COUNT(*) FROM users WHERE idRole = 3) AS total_etudient,
        
        -- Total cours
        (SELECT COUNT(*) FROM cours) AS total_cours,
        
        -- Total utilisateurs actifs
        (SELECT COUNT(*) FROM users WHERE status = 'active') AS total_users_active,
        
        -- Courses per category
        (SELECT STRING_AGG(nom || ' => ' || idCategory, ', ' ORDER BY idCategory ASC) 
         FROM categories) AS courses_per_category,
         
        -- Course with the most students
        (SELECT titre 
         FROM cours 
         WHERE idCours = (
            SELECT cours_id 
            FROM inscriptions 
            GROUP BY cours_id 
            ORDER BY COUNT(*) DESC 
            LIMIT 1
         )
        ) AS course_with_most_students,
        
        -- Top 3 enseignants
        (SELECT STRING_AGG(nom, ', ') 
         FROM (
             SELECT u.nom 
             FROM users u
             LEFT JOIN cours c ON u.idUser = c.enseignant_id
             WHERE u.idRole = 2
             GROUP BY u.idUser, u.nom
             ORDER BY COUNT(c.idCours) DESC
             LIMIT 3
         ) AS top_enseignants
        ) AS top_3_enseignants
";


            $stmt = $pdo->query($query);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result) {
                return $result;
            } else {
                return [
                    'total_enseignant' => 0,
                    'total_etudient' => 0,
                    'total_cours' => 0,
                    'total_users_activie' => 0,
                    'courses_per_category' => 'No data available.',
                    'course_with_most_students' => 'No data available.',
                    'top_3_enseignants' => 'No data available.'
                ];
            }
        } catch (\PDOException $e) {
            echo "Error retrieving statistics: " . $e->getMessage();
            return false;
        }
    }



    public function bannerUser() {
        try {
            $pdo = DatabaseConnection::getInstance();
            $query = "UPDATE users SET status = 'suspended' WHERE idUser = :idUser";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':idUser', $this->idUser, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error banning user: " . $e->getMessage());
            return false;
        }
    }

    public function ActivieUser() {
        try {
            $pdo = DatabaseConnection::getInstance();
            $query = "UPDATE users SET status = 'active' WHERE idUser = :idUser";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':idUser', $this->idUser, \PDO::PARAM_INT);

            return $stmt->execute();
        } catch (\PDOException $e) {
            error_log("Error activating user: " . $e->getMessage());
            return false;
        }
    }


    public function accepterEnseig($idUser)
    {
        try {
            $con = DatabaseConnection::getInstance();
            $sql = "UPDATE users SET status_enseignant = 'accepter' WHERE idUser = :idUser AND idRole = 2";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':idUser', $idUser, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error in accepterEnseig: " . $errorInfo[2]);
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error in accepterEnseig: " . $e->getMessage();
            return false;
        }
    }

    public function refuserEnseig($idUser)
    {
        try {
            $con = DatabaseConnection::getInstance();
            $sql = "UPDATE users SET status_enseignant = 'refuser' WHERE idUser = :idUser AND idRole = 2";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':idUser', $idUser, \PDO::PARAM_INT);

            if ($stmt->execute()) {
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error in refuserEnseig: " . $errorInfo[2]);
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error in refuserEnseig: " . $e->getMessage();
            return false;
        }
    }




}