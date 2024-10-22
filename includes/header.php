<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon CV/Portfolio</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js" defer></script>
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1><a href="index.php">Mon CV/Portfolio</a></h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cv.php">CV</a></li>
                <li><a href="projects.php">Projets</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">Profil</a></li>
                    <?php if ($_SESSION['user_role'] === 'admin'): ?>
                        <li><a href="admin.php">Admin</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="login.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="container">
        <h1>Mon CV</h1>
        <form action="update_cv.php" method="post">
            <div class="form-group">
                <label for="title">Titre:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($cv['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($cv['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="skills">Compétences:</label>
                <textarea class="form-control" id="skills" name="skills" rows="5" required><?php echo htmlspecialchars($cv['skills']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="experiences">Expériences:</label>
                <textarea class="form-control" id="experiences" name="experiences" rows="5" required><?php echo htmlspecialchars($cv['experiences']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="educations">Formations:</label>
                <textarea class="form-control" id="educations" name="educations" rows="5" required><?php echo htmlspecialchars($cv['educations']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</main>
<footer>
    <div class="container">
        <p>&copy; 2021 - Mon CV/Portfolio</p>
    </div>
</footer>
</body>
</html>
