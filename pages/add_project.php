<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    //ajouter le projet dans la base de donnees
    $stmt = $pdo->prepare("INSERT INTO projects (user_id, title, description) VALUES (:user_id, :title, :description)");
    $stmt->execute([
        'user_id' => $user_id,
        'title' => $title,
        'description' => $description
    ]);

    //rediriger vers la page des projets
    header("Location: projects.php");
    exit();
}
?>

<div class="container">
    <h1>Ajouter un projet</h1>
    <form action="add_project.php" method="post">
        <div class="form-group">
            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php
include 'includes/footer.php';
?>
