<?php

namespace App\Models;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

use PDO;
use App\Models\DatabaseConnection;

class User{
    protected $idUser;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $idRole;
    protected $status;

    public function __construct($idUser,$nom,$prenom,$email,$idRole,$status){
        $this->idUser=$idUser;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->status = $status;
        $this->idRole=$idRole;

    }

    public static function login($email, $password) {
        try {
            $pdo = DatabaseConnection::getInstance();
            if (!$pdo) {
                return "Erreur de connexion à la base de données.";
            }
            $query = "SELECT idUser, idRole, nom, prenom,status, password FROM users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    return $user;
                } else {
                    error_log("Password verification failed for email: " . $email);
                    return "Mot de passe incorrect.";
                }
            } else {
                error_log("User not found for email: " . $email);
                return "Utilisateur introuvable avec cet email.";
            }
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return "Une erreur est survenue lors de la connexion.";
        }
    }


    public static function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
    }

    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getIdRole() {
        return $this->idRole;
    }
    public function setIdRole($idRole) {
        $this->idRole = $idRole;
    }

}