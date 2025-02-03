<?php
require_once '../autoload.php';
use Classes\Cours;

header('Content-Type: application/json');

try {
    $searchResults = [];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
        $keyword = trim($_GET['search']);
        
        if (!empty($keyword)) {
            $searchResults = Cours::SearchCours($keyword); 
        }
    }
    echo json_encode($searchResults);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]); 
}
