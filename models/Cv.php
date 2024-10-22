<?php
class CV {
    private $id;
    private $user_id;
    private $title;
    private $description;
    private $skills;
    private $experiences;
    private $educations;

    //constructeur
    public function __construct($id, $user_id, $title, $description, $skills, $experiences, $educations) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->skills = $skills;
        $this->experiences = $experiences;
        $this->educations = $educations;
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

    public function getSkills() {
        return $this->skills;
    }

    public function getExperiences() {
        return $->experiences;
    }

    public function getEducations() {
        return $this->educations;
    }

    //setters
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
    }

    public function setExperiences($experiences) {
        $this->experiences = $experiences;
    }

    public function setEducations($educations) {
        $this->educations = $educations;
    }

    //methode pour enregistrer un nouveau CV dans la base de donnees
    public static function create($pdo, $user_id, $title, $description, $skills, $experiences, $educations) {
        $stmt = $pdo->prepare("INSERT INTO cvs (user_id, title, description, skills, experiences, educations) VALUES (:user_id, :title, :description, :skills, :experiences, :educations)");
        return $stmt->execute([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'skills' => $skills,
            'experiences' => $experiences,
            'educations' => $educations
        ]);
    }

    //methode pour recuperer un CV par ID
    public static function getCVById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM cvs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $cv = $stmt->fetch();
        if ($cv) {
            return new CV($cv['id'], $cv['user_id'], $cv['title'], $cv['description'], $cv['skills'], $cv['experiences'], $cv['educations']);
        }
        return null;
    }

    //methode pour recuperer tous les CV d'un utilisateur
    public static function getCVsByUserId($pdo, $user_id) {
        $stmt = $pdo->prepare("SELECT * FROM cvs WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $cvs = $stmt->fetchAll();
        $cvObjects = [];
        foreach ($cvs as $cv) {
            $cvObjects[] = new CV($cv['id'], $cv['user_id'], $cv['title'], $cv['description'], $cv['skills'], $cv['experiences'], $cv['educations']);
        }
        return $cvObjects;
    }

    //methode pour mettre a jour les informations du CV
    public function update($pdo) {
        $stmt = $pdo->prepare("UPDATE cvs SET title = :title, description = :description, skills = :skills, experiences = :experiences, educations = :educations WHERE id = :id");
        return $stmt->execute([
            'title' => $this->title,
            'description' => $this->description,
            'skills' => $this->skills,
            'experiences' => $this->experiences,
            'educations' => $this->educations,
            'id' => $this->id
        ]);
    }

    //methode pour supprimer un CV
    public static function delete($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM cvs WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
