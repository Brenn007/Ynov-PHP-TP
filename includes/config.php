<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv_portfolio";

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifie la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
