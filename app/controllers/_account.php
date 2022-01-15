<?php
require (dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
require (dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');
$idOfProfilToShow = (empty($_GET['profile'])) ? null : intval($_GET['profile']);
$isMyAccount = false;
$UserToShow = null;
$result = null;
$currentIdUser = $_SESSION['auth']->getId();

// ==> Change informations backend
$emailToModify = (!empty($_POST['changeEmail'])) ? htmlspecialchars($_POST['changeEmail']) : null;
$usernameToModify = (!empty($_POST['changeUsername'])) ? htmlspecialchars($_POST['changeUsername']) : null;
$passwordToModifyLast = (!empty($_POST['changePasswordLast'])) ? htmlspecialchars($_POST['changePasswordLast']) : null;
$passwordToModifyNew = (!empty($_POST['changePasswordNew'])) ? htmlspecialchars($_POST['changePasswordNew']) : null;

$emailError = null;
$emailSuccess = null;

$usernameError = null;
$usernameSuccess = null;

$passwordError = null;
$passwordSuccess = null;

// . Email
if (!is_null($emailToModify)) {
    if (filter_var($emailToModify, FILTER_VALIDATE_EMAIL)) {
        if (!checkDuplicateValueInColumn('user', 'email', $emailToModify)) {
            mysqli->query("UPDATE user SET email = '$emailToModify' WHERE id = $currentIdUser");
            $_SESSION['auth']->setEmail($emailToModify);
            $emailSuccess = "L'adresse email a bien été modifié !";
        } else {
            $emailError = "Cette adresse email est déjà utilisé";
        }
    } else {
        $emailError = "L'adresse email que vous avez rentrée n'est pas une adresse email valide";
    }
}


// . Username
if (!is_null($usernameToModify)) {
    if (!checkDuplicateValueInColumn('user', 'username', $usernameToModify)) {
        mysqli->query("UPDATE user SET username = '$usernameToModify' WHERE id = $currentIdUser");
        $_SESSION['auth']->setUsername($usernameToModify);
        $usernameSuccess = "Votre pseudo a bien été modifié !";
    } else {
        $usernameError = "Ce nom d'utilisateur est déjà prit !";
    }
}

// . Password
if (!is_null($passwordToModifyNew) && !is_null($passwordToModifyLast) && $passwordToModifyLast !== $passwordToModifyNew) {
    $resultPasswd = mysqli->query("SELECT password FROM user WHERE id = $currentIdUser");
    if (password_verify($passwordToModifyLast, $resultPasswd->fetch_row()[0])) {
        $hash = password_hash($passwordToModifyNew, PASSWORD_BCRYPT);
        mysqli->query("UPDATE user SET password = '$hash' WHERE id = $currentIdUser");
        $passwordSuccess = "Votre mot de passe a bien été modifié !";
    } else {
        $passwordError = "L'ancien mot de passe n'est pas correct. Veuillez réessayez.";
    }
}


$passwordColor = (is_null($passwordSuccess)) ? "red" : "green";
$emailColor = (is_null($emailSuccess)) ? "red" : "green";
$usernameColor = (is_null($usernameSuccess)) ? "red" : "green";

// ==> Show profile backend
if (!is_null($idOfProfilToShow)) {
    if ($idOfProfilToShow == $currentIdUser) {
        $UserToShow = $_SESSION['auth'];
        $isMyAccount = true;
    } else {
        $result = mysqli->query("SELECT * FROM user WHERE id = " . $idOfProfilToShow);
        $result = $result->fetch_row();
        if (!empty($result)) {
            $UserToShow = new User($idOfProfilToShow, $result[1], $result[2], $result[4]);
        }
    }
}