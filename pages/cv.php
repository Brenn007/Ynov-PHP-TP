<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/database.php';
include 'models/CV.php';

// Verifier si l'utilisateur est connecte
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

//recuperer les informations du CV de l'utilisateur
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM cvs WHERE user_id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$cv = $stmt->fetch();
?>

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

<?php
include 'includes/footer.php';
?>
