<?php
$title = "Mise à jour du profil";
$headerTitle = "Mise à jour du profil";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE email='".$_SESSION['email']."'";
    if ($conn->query($sql) === TRUE) {
        echo "Profil mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour du profil: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
