<?php
$title = "Favoris des projets";
$headerTitle = "Favoris des projets";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $sql = "UPDATE projects SET favorite=1 WHERE id='$project_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Projet ajouté aux favoris avec succès.";
    } else {
        echo "Erreur lors de l'ajout du projet aux favoris: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
