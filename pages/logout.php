<?php
session_start();

//detruire toutes les variables de session
$_SESSION = array();

//detruire completement la session, effacez egalement le cookie de session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//detruire la session
session_destroy();

//rediriger vers la page de connexion ou la page d'accueil
header("Location: login.php");
exit();
?>
