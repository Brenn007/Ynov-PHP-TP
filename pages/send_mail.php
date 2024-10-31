<?php
$title = "Envoyer un mail";
$headerTitle = "Envoyer un mail";
include('../includes/header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "votre.email@example.com";
    $subject = "Nouveau message de contact";
    $body = "Nom: $name\nEmail: $email\nMessage:\n$message";

    if (mail($to, $subject, $body)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Échec de l'envoi du message.";
    }
}
include('../includes/footer.php');
?>
