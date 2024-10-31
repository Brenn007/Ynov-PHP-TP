<?php
$title = "Validation des commentaires";
$headerTitle = "Validation des commentaires";
include('../includes/header.php');

session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = $_POST['comment_id'];
    $sql = "UPDATE comments SET validated=1 WHERE id='$comment_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Commentaire validé avec succès.";
    } else {
        echo "Erreur de validation du commentaire: " . $conn->error;
    }
}
include('../includes/footer.php');
?>
