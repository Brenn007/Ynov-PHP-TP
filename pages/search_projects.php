<?php
$title = "Recherche de projets";
$headerTitle = "Recherche de projets";
include('../includes/header.php');

include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search_term = $_GET['search_term'];
    $sql = "SELECT * FROM projects WHERE title LIKE '%$search_term%' OR description LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Projet: " . $row["title"]. " - Description: " . $row["description"]. "<br>";
        }
    } else {
        echo "Aucun projet trouvé.";
    }
}
include('../includes/footer.php');
?>
