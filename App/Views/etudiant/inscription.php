<?php
require_once '../autoload.php';
use Classes\Inscription;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $coursId = $_POST['cours_id'] ?? null;
    $etudiantId = $_POST['etudiant_id'] ?? null;

    if ($coursId && $etudiantId) {
        $inscription = new Inscription();
        $message = $inscription->inscrireEtudiant($coursId, $etudiantId);

        if ($message === "Inscription réussie!") {
            echo json_encode(['success' => true, 'message' => $message]);
        } else {
            echo json_encode(['success' => false, 'error' => $message]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid information.']);
    }
    exit;
}
?>
