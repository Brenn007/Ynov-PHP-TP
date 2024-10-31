<?php
$title = "Gestion des commentaires";
$headerTitle = "Gestion des commentaires";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = $_POST['comment_id'];
    $comment = $_POST['comment'];

    $sql = "UPDATE comments SET comment='$comment' WHERE id='$comment_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire mis à jour avec succès.";
    } else {
        echo "Erreur de mise à jour du commentaire: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
