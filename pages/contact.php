<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>CV/portofolio</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="../pages/profile.php">Profil</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Contact</h2>
        <form class="contact-form" action="submit_contact.php" method="post">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit">Envoyer</button>
        </form>
    </main>
    <footer>
        <p>© 2024 CV/PHP</p>
    </footer>
</body>
</html>
