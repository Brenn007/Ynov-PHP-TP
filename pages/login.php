<?php
//inclure les fichiers nécessaires
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">
    <h1>Connexion</h1>
    <form action="authenticate.php" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>

<?php
include 'includes/footer.php';
?>
