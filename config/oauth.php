<?php
require_once 'vendor/autoload.php';

session_start();

//configuration de l'application Google
$clientID = 'VOTRE_CLIENT_ID';
$clientSecret = 'VOTRE_CLIENT_SECRET';
$redirectUri = 'http://votre-site.com/oauth_callback.php';

//creer un client Google
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

//si le code d'autorisation est présent dans l'URL
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    //recuperer les informations de l'utilisateur
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;

    //stocker les informations de l'utilisateur dans la session
    $_SESSION['user_email'] = $email;
    $_SESSION['user_name'] = $name;

    //rediriger vers la page de profil
    header('Location: profile.php');
    exit();
}

//generer l'URL de connexion Google
$login_url = $client->createAuthUrl();
?>

<a href="<?php echo $login_url; ?>">Se connecter avec Google</a>
