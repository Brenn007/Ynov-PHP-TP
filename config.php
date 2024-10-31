<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv_portfolio";

//creer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

//verifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
