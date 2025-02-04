<?php
require_once __DIR__ . '/assets/vendors/autoload.php';

require_once __DIR__ . '/../App/Controllers/AuthController.php';
require_once __DIR__ . '/../App/Controllers/AdminController.php';
require_once __DIR__ . '/../App/Controllers/EtudiantController.php';
require_once __DIR__ . '/../App/Controllers/EnseignantController.php';
require_once __DIR__ . '/../App/Controllers/VisiteurController.php';
require_once __DIR__ . '/../App/Controllers/CoursController.php';
require_once  __DIR__ .'/../Core/Router.php';

//use App\Controllers\VisiteurController;

// Initialisation du router
$router = new Router();
//Auth

// Routes pour afficher les pages
$router->add('GET', '/register', 'AuthController', 'register_pg');
$router->add('GET', '/login', 'AuthController', 'login_pg');
// Routes pour gérer les soumissions de formulaires
$router->add('POST', '/register', 'AuthController', 'register');
$router->add('POST', '/login', 'AuthController', 'login');

// Route pour la déconnexion
//$router->add('GET', '/logout', 'AuthController', 'logout');

//Visiteur
$router->add('GET', '/', 'CoursController', 'index');
$router->add('GET', '/visiteur/about', 'VisiteurController', 'about');
$router->add('GET', '/visiteur/courses', 'VisiteurController', 'courses');
$router->add('GET', '/visiteur/news', 'VisiteurController', 'news');
$router->add('GET', '/visiteur/cours_details', 'VisiteurController', 'cours_details');
$router->add('GET', '/visiteur/news', 'VisiteurController', 'news');
$router->add('GET', '/visiteur/news_details', 'VisiteurController', 'news_details');
$router->add('GET', '/visiteur/teachers-1', 'VisiteurController', 'teachers_1');
$router->add('GET', '/visiteur/contact', 'VisiteurController', 'contact');


//Enseignant


//Etudiant



//admin
$router->add('GET', 'admin', 'AdminController', 'index');








// Dispatcher la requête
try {
    $router->dispatch(str_replace('/ZILOM_MVC/public', '', $_SERVER['REQUEST_URI']), $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    die($e->getMessage());
}
