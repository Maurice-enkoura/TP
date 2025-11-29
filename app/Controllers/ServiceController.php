<?php
class ServiceController {
    
 
    public function index() {
        try {
            $services = Service::all();
            require __DIR__ . "/../views/services/index.php";
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

    
    public function create() {
        require __DIR__ . "/../views/services/create.php";
    }
  
    public function store() {
        try {
            $service = new Service();
            $service->title = trim($_POST['title'] ?? '');
            $service->description = trim($_POST['description'] ?? '');
            $service->price = floatval($_POST['price'] ?? 0);

        
            $errors = $service->validate();
            
            if (empty($errors)) {
                if ($service->save()) {
                    $this->redirectWithMessage('/', "Service créé avec succès !");
                } else {
                    throw new Exception("Erreur lors de la création du service");
                }
            } else {
                $this->handleError(implode('<br>', $errors));
            }
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

  
    public function edit($id) {
        try {
            $service = Service::find($id);//Ici on veut recuperer un service uniquement depuis le model Service,deja que nous allons $id en parmettre celui qui nous permet de modifier un services avec son id 
            
            if (!$service) {
                throw new Exception("Service non trouvé");
            }
            
            require __DIR__ . "/../views/services/edit.php";
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

    // Traite la modification d'un service
    public function update($id) {
        try {
            $service = Service::find($id);
            
            if (!$service) {
                throw new Exception("Service non trouvé");
            }

            $service->title = trim($_POST['title'] ?? '');
            $service->description = trim($_POST['description'] ?? '');
            $service->price = floatval($_POST['price'] ?? 0);

            // Validation
            $errors = $service->validate();
            
            if (empty($errors)) {
                if ($service->save()) {
                    $this->redirectWithMessage('/', "Service modifié avec succès !");
                } else {
                    throw new Exception("Erreur lors de la modification du service");
                }
            } else {
                $this->handleError(implode('<br>', $errors));
            }
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

    // Supprime un service
    public function delete($id) {
        try {
            $service = Service::find($id);
            
            if ($service && $service->delete()) {
                $this->redirectWithMessage('/', "Service supprimé avec succès !");
            } else {
                throw new Exception("Erreur lors de la suppression du service");
            }
        } catch (Exception $e) {
            $this->handleError($e->getMessage());
        }
    }

    // Redirection avec message
    private function redirectWithMessage($url, $message) {
        $_SESSION['flash_message'] = $message;
        header("Location: $url");
        exit();
    }

    // Gestion des erreurs
    private function handleError($message) {
        echo "<div style='color: red; padding: 10px; border: 1px solid red; margin: 10px;'>Erreur : $message</div>";
        echo "<a href='/'>Retour à l'accueil</a>";
        exit();
    }
}

// Démarrer la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}