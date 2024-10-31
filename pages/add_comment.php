<?php
$title = "Ajout de commentaires";
$headerTitle = "Ajout de commentaires";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['project_id'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (project_id, comment) VALUES ('$project_id', '$comment')";
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
