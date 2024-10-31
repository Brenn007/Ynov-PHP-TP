<?php
session_start();
include '../config/database.php';
include '../models/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['first_name']);
    $lastName = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //creer un nouvel utilisateur
    $user = new User($firstName, $lastName, $email, $hashedPassword);

    if ($user->save($pdo)) {
        //enregistrement réussi
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_name'] = $user->getFirstName() . ' ' . $user->getLastName();
        $_SESSION['user_role'] = $user->getRole();
        header("Location: profile.php");
        exit();
    } else {
        //enregistrement échoué
        $error_message = "Erreur lors de l'enregistrement. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="./register.php" method="post">
            <div class="form-group">
                <label for="first_name">Prénom:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nom:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</body>
</html>
