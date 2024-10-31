<?php
$title = "Personnalisation du CV";
$headerTitle = "Personnalisation du CV";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $style = $_POST['style'];
    $sql = "UPDATE cv SET style='$style' WHERE user_id='".$_SESSION['user_id']."'";
    if ($conn->query($sql) === TRUE) {
        echo "Style du CV mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour du style du CV: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
