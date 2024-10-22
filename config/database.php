<?php
//parametres de connexion a la base de donnees
$host = 'localhost';
$db = 'cv_portfolio';
$user = 'root';
$pass = '';

try {
    //creation d'une nouvelle instance PDO pour la connexion a la base de donnees
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Définir le mode d'erreur PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //afficher un message d'erreur en cas d'echec de la connexion
    echo 'Échec de la connexion : ' . $e->getMessage();
}
?>
