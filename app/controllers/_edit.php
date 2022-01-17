<?php

require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');

$editIdArticle = (!empty($_POST['idArticle'])) ? $_POST['idArticle'] : null;
$descriptionMod = (!empty($_POST['descriptionMod'])) ? $_POST['descriptionMod'] : null;
$titleMod = (!empty($_POST['titleMod'])) ? $_POST['titleMod'] : null;

$result = null;
$success = null;
$error = null;


if (!is_null($titleMod) && !is_null($descriptionMod) && !is_null($editIdArticle)) {
    $resultMod = mysqli->query("UPDATE articles SET title = '$titleMod', description = '$descriptionMod' WHERE idArticle = $editIdArticle");
    if ($resultMod !== false) $success = "La modification a bien été prise en compte !";
    else $error = "Oups, il y a eu une erreur lors de la mise à jour de votre compte. Veuillez réessayez.";
}

$colorMsg = ($success) ? "green" : "red";
$postToShow = null;


if (!is_null($editIdArticle)) {
    $result = mysqli->query("SELECT * FROM articles WHERE idArticle = $editIdArticle");
    $result = $result->fetch_row();
    if (is_array($result)) $postToShow = new Post(...$result);
}


