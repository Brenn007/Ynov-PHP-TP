<?php
$title = "Gestion des validations";
$headerTitle = "Gestion des validations";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $validated = $_POST['validated'];

    $sql = "UPDATE projects SET validated='$validated' WHERE id='$project_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Validation du projet mise à jour avec succès.";
    } else {
        echo "Erreur de mise à jour de la validation du projet: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
