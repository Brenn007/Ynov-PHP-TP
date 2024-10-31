<?php
$title = "Gestion des utilisateurs";
$headerTitle = "Gestion des utilisateurs";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET role='$role' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour de l'utilisateur: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
