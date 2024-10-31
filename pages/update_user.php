<?php
$title = "Mise à jour des informations utilisateur";
$headerTitle = "Mise à jour des informations utilisateur";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', password='$password' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour de l'utilisateur: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
