<?php
$title = "Mon CV";
$headerTitle = "Mon CV";
include('../includes/header.php');
?>
<h2>Informations personnelles</h2>
<form action="update_cv.php" method="post">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="Jack daniels" required>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="jack.daniels@example.com" required>
    <label for="description">Description :</label>
    <textarea id="description" name="description" required>Etudiant en informatique...</textarea>
    <button type="submit">Mettre à jour</button>
</form>
<?php include('../includes/footer.php'); ?>
