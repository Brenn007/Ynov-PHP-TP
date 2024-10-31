<?php
$title = "Profil";
$headerTitle = "Mon Profil";
include('../includes/header.php');
?>
<h2>Informations du profil</h2>
<form action="update_profile.php" method="post">
    <label for="first_name">Prénom :</label>
    <input type="text" id="first_name" name="first_name" value="John" required>
    <label for="last_name">Nom :</label>
    <input type="text" id="last_name" name="last_name" value="Doe" required>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="john.doe@example.com" required>
    <button type="submit">Mettre à jour</button>
</form>
<?php include('../includes/footer.php'); ?>
