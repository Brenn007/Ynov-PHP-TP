<?php
$title = "Contact";
$headerTitle = "Contactez-nous";
include('../includes/header.php');
?>
<h2>Formulaire de contact</h2>
<form action="send_mail.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <label for="message">Message :</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">Envoyer</button>
</form>
<?php include('../includes/footer.php'); ?>
