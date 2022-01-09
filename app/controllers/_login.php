<?php

$error = null;
$success = null;

require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'User.php');
$email = (empty($_POST['email'])) ? null : $_POST['email'];
$password = (empty($_POST['password'])) ? null : $_POST['password'];
$deconnect = (empty($_POST['deconnect'])) ? null : $_POST['deconnect'];

if (!is_null($email) && !is_null($password)) {
    $result = mysqli->query("SELECT * FROM user WHERE email = '$email'");
    $result = $result->fetch_all();
    if (!empty($result)) {
        // var_dump();
        if (password_verify($password, $result[0][3])) {
            // Rediriger vers la page d'acceuil
            $User = new User(...$result[0]);
            $_SESSION['auth'] = $User;
        } else {
            $error = "Le mot de passe et/ou l'adresse email ne sont pas valides.";
        }
    } else {
        $error = <<<HTML
        Cette adresse email n'existe pas. Avant de vous connecter, veuillez <a href="./register.php"> vous inscrire </a> 
        HTML;
        
    }
}


if (!is_null($deconnect)) {
    unset($_SESSION['auth']);
}