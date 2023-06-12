<?php

// Inclure les fichiers nécessaires
require_once 'config/config.php';
require_once 'routes.php';

// Récupérer l'URL de la requête
$url = $_SERVER['REQUEST_URI'];

// Parcourir les routes définies
foreach ($routes as $route => $callback) {
    // Vérifier si l'URL correspond à la route
    if (preg_match($route, $url, $matches)) {
        // Appeler la fonction de rappel associée à la route
        $callback($matches);
        // Sortir de la boucle après avoir trouvé une correspondance
        break;
    }
}

// Afficher une page d'erreur 404 si aucune route n'a été trouvée
http_response_code(404);
echo 'Page not found.';