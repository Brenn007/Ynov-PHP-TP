<?php
$title = "Validation des projets";
$headerTitle = "Validation des projets";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $sql = "UPDATE projects SET validated=1 WHERE id='$project_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Projet validé avec succès.";
    } else {
        echo "Erreur de validation du projet: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
