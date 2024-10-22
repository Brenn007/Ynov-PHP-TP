<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/database.php';
include 'models/User.php';
include 'models/Project.php';

//verifier si l'utilisateur est connecte et est un administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

//recuperer tous les utilisateurs
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();

//recuperer tous les projets
$stmt = $pdo->prepare("SELECT * FROM projects");
$stmt->execute();
$projects = $stmt->fetchAll();
?>

<div class="container">
    <h1>Panneau d'administration</h1>
    
    <h2>Gestion des utilisateurs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['role']); ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Modifier</a>
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Gestion des projets</h2>
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
