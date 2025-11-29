<?php
spl_autoload_register(function($class){
    // Remplace les backslashes par des slashes
    $class = str_replace("\\", "/", $class);
    
    // Déterminer le chemin du fichier
    $file = __DIR__ . "/../" . $class . ".php";
    
    // Debug: afficher le chemin recherché
    // echo "Recherche de la classe: $class -> $file<br>";
    
    if (file_exists($file)) {
        require_once $file;
    } else {
        // Essayer avec une structure différente
        $alternativePaths = [
            __DIR__ . "/../Controllers/" . $class . ".php",
            __DIR__ . "/../Models/" . $class . ".php",
            __DIR__ . "/../Core/" . $class . ".php"
        ];
        
        $found = false;
        foreach ($alternativePaths as $path) {
            if (file_exists($path)) {
                require_once $path;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            throw new Exception("Classe non trouvée : " . $class . " (Recherché dans: " . $file . ")");
        }
    }
});