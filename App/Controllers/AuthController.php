<?php

namespace App\Controllers;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

class AuthController
{


    public function login()
    {
        require_once __DIR__ . '/../Views/visiteur/login.php';
    }
    public function register()
    {
        require_once __DIR__ . '/../Views/visiteur/register.php';
    }

}