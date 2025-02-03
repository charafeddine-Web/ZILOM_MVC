<?php

use Core\Router;

require_once __DIR__ . '/../assets/vendors/autoload.php';
require_once __DIR__ . '/../App/Controllers/HomeController.php';
require_once __DIR__ . '/../App/Controllers/AdminController.php';
require_once __DIR__ . '/../App/Controllers/EtudiantController.php';
require_once __DIR__ . '/../App/Controllers/EnseignantController.php';
require_once __DIR__ . '/../App/Controllers/VisiteurController.php';
require_once __DIR__ . '/../App/Controllers/CoursController.php';


require_once  __DIR__ .'/../Core/Router.php';
// Initialisation du router
$router = new Router();

// Ajout des routes
$router->add('GET', '/', 'HomeController', 'index');

$router->add('GET', 'admin', 'AdminController', 'index');
$router->add('POST', 'login', 'AuthController', 'login');
$router->add('POST', 'logout', 'AuthController', 'logout');

// Dispatcher la requête
try {
    $router->dispatch(str_replace('/ZILOM_MVC/public', '', $_SERVER['REQUEST_URI']), $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    die($e->getMessage());
}
