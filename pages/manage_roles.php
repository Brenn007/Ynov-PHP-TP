<?php
$title = "Gestion des rôles";
$headerTitle = "Gestion des rôles";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET role='$role' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Rôle de l'utilisateur mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour du rôle de l'utilisateur: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
