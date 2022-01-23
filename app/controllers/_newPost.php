<?php
// require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
$description = (empty($_POST['description'])) ? null : $_POST['description'];
$titlePost = (empty($_POST['title'])) ? null : $_POST['title'];
$error = null;
$success = null;

if (!is_null($description) && !is_null($titlePost)) {
    // Security to avoid sql injection
    $description = htmlspecialchars($description);
    $titlePost = htmlspecialchars($titlePost);
    mysqli->query("INSERT INTO articles (title, description, dateOfPost, idUser)
    VALUES (\"$titlePost\", \"$description\", NOW(), " . $_SESSION['auth']->getId()  . ") ;");
    $success = "Votre post est bien publié";
} else {
    $error = "Veuillez compléter tout les champs !";
}
