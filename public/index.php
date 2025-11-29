<?php

require "../app/Core/autoload.php";


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$controller = new ServiceController();


try {
    switch (true) {
        case $uri === "/" || $uri === "/services":
            $controller->index();
            break;
            
        case $uri === "/create":
            $controller->create();
            break;
            
        case $uri === "/store" && $method === "POST":
            $controller->store();
            break;
            
        case preg_match('#^/edit/(\d+)$#', $uri, $matches):
            $controller->edit($matches[1]);
            break;
            
        case preg_match('#^/update/(\d+)$#', $uri, $matches) && $method === "POST":
            $controller->update($matches[1]);
            break;
            
        case preg_match('#^/delete/(\d+)$#', $uri, $matches):
            $controller->delete($matches[1]);
            break;
            
        default:
            http_response_code(404);
            echo "<h1>404 - Page non trouvée</h1>";
            echo "<p>La page que vous recherchez n'existe pas.</p>";
            echo "<a href='/'>Retour à l'accueil</a>";
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "<h1>500 - Erreur serveur</h1>";
    echo "<p>Une erreur s'est produite : " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<a href='/'>Retour à l'accueil</a>";
}