<?php

namespace App\Models;
use PDO;

class DatabaseConnection
{
    /**
     * @var 
     */
    private static $instance=null ;
    private function __construct() {}
    public static function getInstance(){
        if(self::$instance==null){
            $config = include(__DIR__ . '/../../config/config.php');
            try {
                self::$instance = new PDO("pgsql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (\PDOException $e) {
                error_log("Database connection error: " . $e->getMessage());
                return null;
            }
        }
        return self::$instance;
    }
}