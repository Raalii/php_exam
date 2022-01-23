<?php
$currentUser = $_SESSION['auth'];

$deleteUserId = $_POST['deleteUser'] ?? null;
$deletePostId = $_POST['deletePost'] ?? null;

$deleteUserSuccess = null;
$deleteUserError = null;

$deletePostSuccess = null;
$deletePostError = null;


if (!is_null($deleteUserId)) {
    $result = mysqli->query("DELETE FROM user WHERE id = $deleteUserId");
    if ($result) {
        $deleteUserSuccess = "L'utilisateur a bien été supprimé !";
    } else {
        $deleteUserError = "Il y a eu une erreur lors de la suppression de l'utilisateur. Veuillez réessayer";
    }
}



if (!is_null($deletePostId)) {
    $result = mysqli->query("DELETE FROM articles WHERE idArticle = $deletePostId");
    if ($result) {
        $deletePostSuccess = "Le Post a bien été supprimé !";
    } else {
        $deletePostError = "Il y a eu une erreur lors de la suppression du poste. Veuillez réessayer";
    }
}

$deletePostColor = ($deletePostSuccess) ? "green" : "red";
$deleteUserColor = ($deleteUserSuccess) ? "green" : "red";
$selection = "idArticle, title, description, dateOfPost, idUser, email, username, type";



$resultUser = mysqli->query('SELECT * FROM user ORDER BY id DESC');
$resultPost = mysqli->query("SELECT $selection FROM articles INNER JOIN user ON user.id = articles.idUser ORDER BY dateOfPost DESC");
