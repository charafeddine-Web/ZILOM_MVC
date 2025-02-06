<?php
require_once __DIR__ . '/assets/vendors/autoload.php';
require_once __DIR__ . '/../App/Controllers/AuthController.php';
require_once __DIR__ . '/../App/Controllers/AdminController.php';
require_once __DIR__ . '/../App/Controllers/EtudiantController.php';
require_once __DIR__ . '/../App/Controllers/EnseignantController.php';
require_once __DIR__ . '/../App/Controllers/VisiteurController.php';
require_once __DIR__ . '/../App/Controllers/CoursController.php';
require_once  __DIR__ .'/../Core/Router.php';


$router = new Router();

//Auth
$router->add('GET', '/register', 'AuthController', 'register_pg');
$router->add('GET', '/login', 'AuthController', 'login_pg');
$router->add('POST', '/register', 'AuthController', 'register');
$router->add('POST', '/login', 'AuthController', 'login');

//logout
$router->add('POST', '/logout', 'AuthController', 'logout');

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


//Etudiant
$router->add('GET', '/etudient/indexEtu', 'EtudiantController', 'index_etudiant');
$router->add('GET', '/etudient/mecours', 'EtudiantController', 'mecours');
$router->add('GET', '/etudient/cours-details', 'EtudiantController', 'cours_details');
$router->add('GET', '/etudient/inscriprion', 'EtudiantController', 'inscriprionc');

//Enseignant
$router->add('GET', '/enseignant/indexEns', 'EnseignantController', 'index');
$router->add('GET', '/enseignant/cours', 'EnseignantController', 'cours_ens');
$router->add('GET', '/enseignant/etudient', 'EnseignantController', 'etudiant_ens');
$router->add('POST', '/enseignant/cours', 'CoursController', 'Addcours');



//admin
$router->add('GET', '/admin/index', 'AdminController', 'index');


// Dispatcher la requête
try {
    $router->dispatch(str_replace('/ZILOM_MVC/public', '', $_SERVER['REQUEST_URI']), $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    die($e->getMessage());
}
