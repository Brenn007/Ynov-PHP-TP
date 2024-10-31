<?php
$title = "Gestion des compétences";
$headerTitle = "Gestion des compétences";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $skill_id = $_POST['skill_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $years_of_experience = $_POST['years_of_experience'];

    $sql = "UPDATE skills SET title='$title', description='$description', years_of_experience='$years_of_experience' WHERE id='$skill_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Compétence mise à jour avec succès.";
    } else {
        echo "Erreur de mise à jour de la compétence: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
