<?php
session_start();
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $skills = htmlspecialchars($_POST['skills']);
    $experiences = htmlspecialchars($_POST['experiences']);
    $educations = htmlspecialchars($_POST['educations']);

    //mettre à jour les informations du CV dans la base de données
    $stmt = $pdo->prepare("UPDATE cvs SET title = :title, description = :description, skills = :skills, experiences = :experiences, educations = :educations WHERE user_id = :user_id");
    $stmt->execute([
        'title' => $title,
        'description' => $description,
        'skills' => $skills,
        'experiences' => $experiences,
        'educations' => $educations,
        'user_id' => $user_id
    ]);

    //rediriger vers la page CV
    header("Location: cv.php");
    exit();
}
?>
