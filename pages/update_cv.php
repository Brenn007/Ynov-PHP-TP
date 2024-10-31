<?php
$title = "Mise à jour du CV";
$headerTitle = "Mise à jour du CV";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $sql = "UPDATE users SET name='$name', email='$email', description='$description' WHERE email='".$_SESSION['email']."'";
    if ($conn->query($sql) === TRUE) {
        echo "CV mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour du CV: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
