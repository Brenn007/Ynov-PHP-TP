<nav class="navbar">
    <div class="container">
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
    </div>
</nav>
