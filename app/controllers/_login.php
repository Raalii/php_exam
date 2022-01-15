<?php

$error = null;
$success = null;

require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'User.php');
$emailOrUsername = (empty($_POST['email'])) ? null : $_POST['email'];
$password = (empty($_POST['password'])) ? null : $_POST['password'];
$deconnect = (empty($_POST['deconnect'])) ? null : $_POST['deconnect'];

if (!is_null($emailOrUsername) && !is_null($password)) {
    // If the type of value (username or email)
    $column = (filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL) == false) ? 'username' : 'email';
    $result = mysqli->query("SELECT * FROM user WHERE $column = '$emailOrUsername'");
    $result = $result->fetch_row();
    if (!empty($result)) {
        if (password_verify($password, $result[3])) {
            $User = new User($result[0], $result[1], $result[2], $result[4]);
            $_SESSION['auth'] = $User;
        } else {
            $error = "Le mot de passe et/ou l'adresse email ne sont pas valides.";
        }
    } else {
        $error = <<<HTML
        Cette adresse email/pseudo n'existe pas. Avant de vous connecter, veuillez <a href="./register.php"> vous inscrire </a> 
        HTML;
        
    }
}


if (!is_null($deconnect)) {
    unset($_SESSION['auth']);
}