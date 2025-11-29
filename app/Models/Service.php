<?php
class Service {
    public $iid;
    //public $Slug;
    public $title;
    public $description;
    public $price;
    public $created_at;


    public static function all() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM services ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    
    public static function find($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM services WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetch();
    }

    
    public function save() {
        $db = Database::connect();
        
        if (empty($this->id)) {
            
            $stmt = $db->prepare("INSERT INTO services (title, description, price) VALUES (?, ?, ?)");
            $result = $stmt->execute([$this->title, $this->description, $this->price]);
            
            if ($result) {
                $this->id = $db->lastInsertId();
            }
            
            return $result;
        } else {
            
            $stmt = $db->prepare("UPDATE services SET title = ?, description = ?, price = ? WHERE id = ?");
            return $stmt->execute([$this->title, $this->description, $this->price, $this->id]);
        }
    }

    
    public function delete() {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM services WHERE id = ?");
        return $stmt->execute([$this->id]);
    }

    public function validate() {
        $errors = [];

        if (empty($this->title)) {
            $errors[] = "Le titre est obligatoire";
        } elseif (strlen($this->title) < 3) {
            $errors[] = "Le titre doit faire au moins 3 caractères";
        }

        if (empty($this->price)) {
            $errors[] = "Le prix est obligatoire";
        } elseif (!is_numeric($this->price) || $this->price < 0) {
            $errors[] = "Le prix doit être un nombre positif";
        }

        return $errors;
    }
}