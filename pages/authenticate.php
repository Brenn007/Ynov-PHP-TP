<?php
$title = "Authentification";
$headerTitle = "Authentification";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: profil.php");
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
include('../includes/footer.php');
?>
