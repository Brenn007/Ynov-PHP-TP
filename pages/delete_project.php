<?php
$title = "Suppression de projet";
$headerTitle = "Suppression de projet";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $sql = "DELETE FROM projects WHERE id='$project_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Projet supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du projet: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
