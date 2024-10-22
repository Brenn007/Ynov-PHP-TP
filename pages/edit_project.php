<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_id = $_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    //mettre a jour le projet dans la base de donnees
    $stmt = $pdo->prepare("UPDATE projects SET title = :title, description = :description WHERE id = :id");
    $stmt->execute([
        'title' => $title,
        'description' => $description,
        'id' => $project_id
    ]);

    //rediriger vers la page des projets
    header("Location: projects.php");
    exit();
}

//recuperer les informations du projet a modifier
$project_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id = :id");
$stmt->execute(['id' => $project_id]);
$project = $stmt->fetch();
?>

<div class="container">
    <h1>Modifier le projet</h1>
    <form action="edit_project.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($project['id']); ?>">
        <div class="form-group">
            <label for="title">Titre:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($project['description']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<?php
include 'includes/footer.php';
?>
