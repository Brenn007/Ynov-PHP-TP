<?php
$title = "Personnalisation des projets";
$headerTitle = "Personnalisation des projets";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $style = $_POST['style'];
    $sql = "UPDATE projects SET style='$style' WHERE user_id='".$_SESSION['user_id']."'";
    if ($conn->query($sql) === TRUE) {
        echo "Style des projets mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour du style des projets: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
