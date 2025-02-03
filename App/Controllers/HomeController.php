<?php

namespace App\Controllers;
require_once __DIR__ . '/../../public/assets/vendors/autoload.php';

class HomeController
{

    public function index()
    {
        require_once __DIR__ . '/../Views/index.php';

    }


}