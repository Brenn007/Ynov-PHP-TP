<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>CV/portofolio</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="login-container">
            <h2>Connexion</h2>
            <form action="submit_login.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </main>
    <footer>
        <p>© 2024 CV/PHP</p>
    </footer>
</body>
</html>
