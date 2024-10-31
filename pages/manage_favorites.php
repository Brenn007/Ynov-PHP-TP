<?php
$title = "Gestion des favoris";
$headerTitle = "Gestion des favoris";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $favorite = $_POST['favorite'];

    $sql = "UPDATE projects SET favorite='$favorite' WHERE id='$project_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Favoris mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour des favoris: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
