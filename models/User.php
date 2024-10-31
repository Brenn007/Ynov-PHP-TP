<?php
class User {
    private $id;
    private $email;
    private $first_name;
    private $last_name;
    private $password;
    private $role;

    //constructeur
    public function __construct($id, $email, $first_name, $last_name, $password, $role) {
        $this->id = $id;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->role = $role;
    }

    //getters
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getRole() {
        return $this->role;
    }

    //setters
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    //methode pour vérifier le mot de passe
    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    //methode pour hacher le mot de passe
    public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //methode pour enregistrer un nouvel utilisateur dans la base de donnees
    public static function register($pdo, $email, $first_name, $last_name, $password, $role) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (email, first_name, last_name, password, role) VALUES (:email, :first_name, :last_name, :password, :role)");
        return $stmt->execute([
            'email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'password' => $hashed_password,
            'role' => $role
        ]);
    }

    //methode pour recuperer un utilisateur par email
    public static function getUserByEmail($pdo, $email) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if ($user) {
            return new User($user['id'], $user['email'], $user['first_name'], $user['last_name'], $user['password'], $user['role']);
        }
        return null;
    }

    //methode pour recuperer un utilisateur par ID
    public static function getUserById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        if ($user) {
            return new User($user['id'], $user['email'], $user['first_name'], $user['last_name'], $user['password'], $user['role']);
        }
        return null;
    }

    //methode pour mettre a jour les informations de l'utilisateur
    public function update($pdo) {
        $stmt = $pdo->prepare("UPDATE users SET email = :email, first_name = :first_name, last_name = :last_name, password = :password, role = :role WHERE id = :id");
        return $stmt->execute([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'password' => $this->password,
            'role' => $this->role,
            'id' => $this->id
        ]);
    }

    //methode pour supprimer un utilisateur
    public static function delete($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
