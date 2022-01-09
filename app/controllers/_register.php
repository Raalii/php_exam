<?php

$error = null;
$success = null;
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');

$email = (empty($_POST['email'])) ? null : $_POST['email'];
$username = (empty($_POST['username'])) ? null : $_POST['username'];
$password = (empty($_POST['password'])) ? null : $_POST['password'];
$vpassword = (empty($_POST['vpassword'])) ? null : $_POST['vpassword'];



if (!is_null($email) && !is_null($username) && !is_null($password)) {
    if (!checkDuplicateValueInColumn("user", "username", $username) && !checkDuplicateValueInColumn("user", "email", $email)) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Check email 
            if (password_verify($vpassword, $password)) { // Check password
                $statement = mysqli->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
                $statement->bind_param("sss", $email, $username, $password);
                $statement->execute();
                $success = "Votre inscription a été enregistré avec succès";
            } else {
                $error = "Les mots de passe ne sont pas pareils";
            }
        } else {
            $error = "Votre adresse email n'est pas valide";
        }
    } else {
        $error = "Le pseudo et/ou l'adresse email sont déjà utilisés par un autre compte !";
    }
    if (is_null($success)) {
        $error = (!empty($error)) ? $error :  "Toutes les valeurs n'ont pas été validée, reéssayez";
    }
}
