<?php
$title = "Gestion des expériences";
$headerTitle = "Gestion des expériences";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $experience_id = $_POST['experience_id'];
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "UPDATE experiences SET title='$title', start_date='$start_date', end_date='$end_date' WHERE id='$experience_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Expérience mise à jour avec succès.";
    } else {
        echo "Erreur de mise à jour de l'expérience: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
