<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/database.php';
include 'models/User.php';

//verifier si l'utilisateur est connecte
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

//recuperer les informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch();
?>

<div class="container">
    <h1>Profil de <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h1>
    <form action="update_profile.php" method="post">
        <div class="form-group">
            <label for="first_name">Prénom:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Nom:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<?php
include 'includes/footer.php';
?>
