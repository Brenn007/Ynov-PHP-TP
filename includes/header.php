<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - CV/Portfolio</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1><?php echo $headerTitle; ?></h1>
        <nav>
    <ul>
        <li><a href="./pages/contact.php">Contact</a></li>
        <li><a href="./pages/cv.php">CV</a></li>
        <li><a href="./pages/projets.php">Projets</a></li>
        <li><a href="./pages/login.php">Login</a></li>
        <?php if (isset($_SESSION['email'])): ?>
            <li><a href="./pages/logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
    </nav>
    </header>
    <main>
