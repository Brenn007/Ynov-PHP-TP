<?php
$title = "Admin";
$headerTitle = "Panneau d'administration";
include('../includes/header.php');
?>
<h2>Gestion des utilisateurs</h2>
<form action="manage_users.php" method="post">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <label for="role">Rôle :</label>
    <select id="role" name="role">
        <option value="user">Utilisateur</option>
        <option value="admin">Administrateur</option>
    </select>
    <button type="submit">Mettre à jour</button>
</form>
<h2>Gestion des projets</h2>
<form action="manage_projects.php" method="post">
    <label for="project_title">Titre du projet :</label>
    <input type="text" id="project_title" name="project_title" required>
    <label for="project_description">Description :</label>
    <textarea id="project_description" name="project_description" required></textarea>
    <button type="submit">Mettre à jour</button>
</form>
<?php include('../includes/footer.php'); ?>
