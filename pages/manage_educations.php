<?php
$title = "Gestion des formations";
$headerTitle = "Gestion des formations";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $education_id = $_POST['education_id'];
    $school = $_POST['school'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "UPDATE educations SET school='$school', start_date='$start_date', end_date='$end_date' WHERE id='$education_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Formation mise à jour avec succès.";
    } else {
        echo "Erreur de mise à jour de la formation: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
