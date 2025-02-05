<?php

namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';
use App\Models\DatabaseConnection;
use PDO;
class Inscription
{
    /**
     * Fetch all inscriptions with course, teacher, and student details.
     *
     * @return array|false
     */
    public function getAllInscriptions()
    {
        try {
            $pdo = DatabaseConnection::getInstance();

            $sql = "
                SELECT 
                    i.idInscription,
                    c.idCours,
                    c.titre AS course_title,
                    c.description AS course_description,
                    u_teacher.nom AS teacher_name,
                    u_teacher.prenom AS teacher_surname,
                    u_student.nom AS student_name,
                    u_student.prenom AS student_surname,
                    i.date_inscription
                FROM 
                    inscriptions i
                INNER JOIN 
                    cours c ON i.cours_id = c.idCours
                INNER JOIN 
                    users u_teacher ON c.enseignant_id = u_teacher.idUser
                INNER JOIN 
                    users u_student ON i.etudiant_id = u_student.idUser
                ORDER BY 
                    i.date_inscription DESC
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching inscriptions: " . $e->getMessage();
            return false;
        }
    }
    public function getInscriptionsByTeacher($teacherId)
    {
        try {
            $pdo = DatabaseConnection::getInstance();

            $sql = "
                SELECT 
                    i.idInscription,
                    c.idCours,
                    c.titre AS course_title,
                    c.description AS course_description,
                    u_student.nom AS student_name,
                    u_student.prenom AS student_surname,
                    i.date_inscription
                FROM 
                    inscriptions i
                INNER JOIN 
                    cours c ON i.cours_id = c.idCours
                INNER JOIN 
                    users u_teacher ON c.enseignant_id = u_teacher.idUser
                INNER JOIN 
                    users u_student ON i.etudiant_id = u_student.idUser
                WHERE 
                    u_teacher.idUser = :teacherId
                ORDER BY 
                    i.date_inscription DESC
            ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':teacherId', $teacherId, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching inscriptions for teacher: " . $e->getMessage();
            return false;
        }
    }

    public function getStudentsByTeacher($teacherId)
    {
        try {
            $pdo = DatabaseConnection::getInstance();

            $sql = "
            SELECT 
                u_student.nom AS student_name,
                u_student.prenom AS student_surname,
                c.titre AS course_title,
                c.description AS course_description,
                i.date_inscription
            FROM 
                inscriptions i
            INNER JOIN 
                cours c ON i.cours_id = c.idCours
            INNER JOIN 
                users u_student ON i.etudiant_id = u_student.idUser
            WHERE 
                c.enseignant_id = :teacherId
            ORDER BY 
                i.date_inscription DESC
        ";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':teacherId', $teacherId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error fetching students: " . $e->getMessage();
            return false;
        }
    }


    public function inscrireEtudiant($coursId, $etudiantId) {
        $pdo = DatabaseConnection::getInstance();

        try {
            $query = "SELECT * FROM inscriptions WHERE cours_id = :cours_id AND etudiant_id = :etudiant_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['cours_id' => $coursId, 'etudiant_id' => $etudiantId]);

            if ($stmt->rowCount() > 0) {
                return "Vous êtes déjà inscrit à ce cours.";
            }
            $query = "INSERT INTO inscriptions (cours_id, etudiant_id) VALUES (:cours_id, :etudiant_id)";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['cours_id' => $coursId, 'etudiant_id' => $etudiantId]);

            return "Inscription réussie!";
        } catch (\PDOException $e) {
            return "Erreur lors de l'inscription: " . $e->getMessage();
        }
    }


    // get all inscriptions d'une etudient
    public function getAllInscriptionsEtudient($etudiantId) {
        $pdo = DatabaseConnection::getInstance();
        try {
            $stmt = $pdo->prepare("
                SELECT 
                    i.idInscription, 
                    i.date_inscription, 
                    c.idCours, 
                    c.titre, 
                    c.description , 
                    c.contenu, 
                    c.type, 
                    c.date_creation , 
                    u.idUser AS student_id, 
                    concat(u.nom ,u.prenom ) AS fullname, 
                    u.email AS email 
                FROM inscriptions i
                JOIN cours c ON i.cours_id = c.idCours
                JOIN users u ON i.etudiant_id = u.idUser
                WHERE i.etudiant_id = :etudiant_id
            ");
            $stmt->bindParam(':etudiant_id', $etudiantId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ?: [];
        } catch (\PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    public function checkEnrollment($etudiantId, $courseId) {
        $pdo = DatabaseConnection::getInstance();
        try {
            $stmt = $pdo->prepare("
                SELECT COUNT(*) 
                FROM inscriptions 
                WHERE etudiant_id = :etudiant_id AND cours_id = :course_id
            ");
            $stmt->bindParam(':etudiant_id', $etudiantId, PDO::PARAM_INT);
            $stmt->bindParam(':course_id', $courseId, PDO::PARAM_INT);
            $stmt->execute();

            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (\PDOException $e) {
            return false;
        }
    }

}