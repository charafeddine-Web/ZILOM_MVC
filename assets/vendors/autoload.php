<?php
spl_autoload_register(function ($className) {
    $prefix = 'App\\Models\\';
    $baseDir = __DIR__ . '/../../app/Models/';
    // Vérifier que la classe appartient bien au namespace "App\Models"
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        return;
    }
    // Extraire la classe sans le namespace "App\Models"
    $relativeClass = substr($className, $len);
    // Construire le chemin du fichier
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    // Inclure le fichier si il existe
    if (file_exists($file)) {
        require_once $file;
    }
});
