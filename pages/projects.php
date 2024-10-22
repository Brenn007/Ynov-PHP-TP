<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/database.php';
include 'models/Project.php';

//verifier si l'utilisateur est connecte
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

//recuperer tous les projets de l'utilisateur connecte
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$projects = $stmt->fetchAll();
?>

<div class="container">
    <h1>Mes Projets</h1>
    <a href="add_project.php" class="btn btn-success">Ajouter un projet</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo htmlspecialchars($project['id']); ?></td>
                <td><?php echo htmlspecialchars($project['title']); ?></td>
                <td><?php echo htmlspecialchars($project['description']); ?></td>
                <td>
                    <a href="edit_project.php?id=<?php echo $project['id']; ?>" class="btn btn-warning">Modifier</a>
                    <a href="delete_project.php?id=<?php echo $project['id']; ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include 'includes/footer.php';
?>
