<?php
class Project {
    private $id;
    private $user_id;
    private $title;
    private $description;
    private $image;

    //constructeur
    public function __construct($id, $user_id, $title, $description, $image) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    //getters
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    //setters
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    //methode pour enregistrer un nouveau projet dans la base de donnees
    public static function create($pdo, $user_id, $title, $description, $image) {
        $stmt = $pdo->prepare("INSERT INTO projects (user_id, title, description, image) VALUES (:user_id, :title, :description, :image)");
        return $stmt->execute([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'image' => $image
        ]);
    }

    //methode pour recuperer un projet par ID
    public static function getProjectById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $project = $stmt->fetch();
        if ($project) {
            return new Project($project['id'], $project['user_id'], $project['title'], $project['description'], $project['image']);
        }
        return null;
    }

    //methode pour recuperer tous les projets d'un utilisateur
    public static function getProjectsByUserId($pdo, $user_id) {
        $stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $projects = $stmt->fetchAll();
        $projectObjects = [];
        foreach ($projects as $project) {
            $projectObjects[] = new Project($project['id'], $project['user_id'], $project['title'], $project['description'], $project['image']);
        }
        return $projectObjects;
    }

    //methode pour mettre a jour les informations du projet
    public function update($pdo) {
        $stmt = $pdo->prepare("UPDATE projects SET title = :title, description = :description, image = :image WHERE id = :id");
        return $stmt->execute([
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'id' => $this->id
        ]);
    }

    //methode pour supprimer un projet
    public static function delete($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM projects WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
