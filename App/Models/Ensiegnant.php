<?php

namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';
use App\Models\User;
use App\Models\DatabaseConnection;
use PDO;
class Ensiegnant  extends User
{
    protected $password;
    protected $dateInscription;
    protected $status_enseignant;

    public function __construct($idUser, $nom, $prenom, $email, $password, $status = 'active', $dateInscription = null,$status_enseignant='en_attente')
    {
        parent::__construct($idUser, $nom, $prenom, $email,2,$status);
        $this->password = $password;
        $this->dateInscription = $dateInscription ?? date('Y-m-d H:i:s');
        $this->status_enseignant = $status_enseignant;
    }

    public function validateStatus(): bool
    {
        try {
            $con = DatabaseConnection::getInstance();
            $sql = "SELECT status_enseignant FROM users WHERE idUser = :idUser";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $this->status_enseignant = $result['status_enseignant'];
                return $this->status_enseignant === 'accepter';
            } else {
                error_log("User not found for idUser: " . $this->idUser);
                return false;
            }
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }

    }


    public function register()
    {
        try {
            $con = DatabaseConnection::getInstance();
            $sql = "INSERT INTO users (nom, prenom, email, password, status, date_creation, idRole, status_enseignant) 
                VALUES (:nom, :prenom, :email, :password, :status, :dateInscription, :idRole, :status_enseignant)";
            $stmt = $con->prepare($sql);
            $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
            $idRole = 2;
            $stmt->bindParam(':nom', $this->nom, \PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $this->prenom, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, \PDO::PARAM_STR);
            $stmt->bindParam(':status', $this->status, \PDO::PARAM_STR);
            $stmt->bindParam(':dateInscription', $this->dateInscription, \PDO::PARAM_STR);
            $stmt->bindParam(':idRole', $idRole, \PDO::PARAM_INT);
            $stmt->bindParam(':status_enseignant', $this->status_enseignant, \PDO::PARAM_STR);
            if ($stmt->execute()) {
                $this->idUser = $con->lastInsertId();
                return true;
            } else {
                $errorInfo = $stmt->errorInfo();
                error_log("SQL Error: " . $errorInfo[2]);
                return false;
            }
        } catch (\PDOException $e) {
            echo "Registration Error: " . $e->getMessage();
            return false;
        }
    }

    public static function showAllEnseignant()
    {
        try {
            $con = DatabaseConnection::getInstance();
            $sql = "SELECT idUser, nom, prenom, email, status, date_creation ,idRole,status_enseignant
                    FROM users WHERE idRole = 2";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Error retrieving all Etudiant: " . $e->getMessage();
            return false;
        }
    }



    public function getStatus()
    {
        return $this->status;
    }
    public function getstatus_enseignant()
    {
        return $this->status_enseignant;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setstatus_enseignant($status_enseignant)
    {
        $this->status_enseignant = $status_enseignant;
    }
}