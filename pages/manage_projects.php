<?php
$title = "Gestion des projets";
$headerTitle = "Gestion des projets";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_title = $_POST['project_title'];
    $project_description = $_POST['project_description'];

    $sql = "INSERT INTO projects (title, description) VALUES ('$project_title', '$project_description')";
    if ($conn->query($sql) === TRUE) {
        echo "Projet ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du projet: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
