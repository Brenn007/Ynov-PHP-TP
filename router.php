<?php
//inclure le fichier de configuration
include('config.php');

//demarrer la session
session_start();

//obtenir l'URL demandée
$request = $_SERVER['REQUEST_URI'];

//definir les routes et les fichiers correspondants
$routes = [
    '/' => 'index.php',
    '/contact' => '/pages/contact.php',
    '/cv' => '/pages/cv.php',
    '/projets' => '/pages/projets.php',
    '/login' => '/pages/logout.php',
    '/profil' => '/pages/profil.php',
    '/admin' => '/pages/admin.php',
    '/send_mail' => '/pages/send_mail.php',
    '/authenticate' => '/pages/authenticate.php',
    '/update_cv' => '/pages/update_cv.php',
    '/update_profile' => '/pages/update_profile.php',
    '/manage_users' => '/pages/manage_users.php',
    '/manage_projects' => 'pages/manage_projects.php',
    '/manage_comments' => '/pages/manage_comments.php',
    '/manage_experiences' => '/pages/manage_experiences.php',
    '/manage_educations' => '/pages/manage_educations.php',
    '/manage_skills' => '/pages/manage_skills.php',
    '/validate_project' => 'pages/validate_project.php',
    '/search_projects' => '/pages/search_projects.php',
    '/download_cv' => '/pages/download_cv.php',
    '/customize_cv' => '/pages/customize_cv.php',
    '/customize_projects' => '/pages/customize_projects.php',
    '/favorite_project' => '/pages/favorite_project.php',
    '/add_comment' => '/pages/add_comment.php',
    '/delete_project' => '/pages/delete_project.php',
    '/delete_user' => '/pages/delete_user.php',
    '/delete_comment' => '/pages/delete_comment.php',
    '/manage_roles' => '/pages/manage_roles.php',
    '/manage_favorites' => '/pages/manage_favorites.php',
    '/manage_validations' => '/pages/manage_validations.php',
];

//verifier si la route existe
if (array_key_exists($request, $routes)) {
    include($routes[$request]);
} else {
    //page 404 si la route n'existe pas
    http_response_code(404);
    echo "Page non trouvée";
}
?>
