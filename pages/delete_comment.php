<?php
$title = "Suppression de commentaire";
$headerTitle = "Suppression de commentaire";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = $_POST['comment_id'];
    $sql = "DELETE FROM comments WHERE id='$comment_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du commentaire: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
