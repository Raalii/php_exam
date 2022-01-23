<?php 
$idUser = $_SESSION['auth']->getId();
$nbrOfArticles = checkNbrOfPost($idUser);
$result = null;
$resultRow = null;

$choice = $idArticle ?? $_POST['articleDetail'] ?? null;
$delete = (empty($_POST['delete'])) ? null : $_POST['delete'];
$success = null;
$selection = "idArticle, title, description, dateOfPost, idUser, image, email, username, type";
$Post_User = null;


if (!is_null($choice)) {
    if (!is_null($delete)) {
        $result = mysqli->query("DELETE FROM articles WHERE idArticle = $choice");
        $success = ($result == true) ? "L'article a bien été supprimé" : "Il y a eu une erreur lors de la suppression de votre article. Veuillez retry stp";
    } else {
        $result = mysqli->query("SELECT $selection FROM articles INNER JOIN user ON user.id = articles.idUser WHERE idArticle = $choice");
        $result = $result->fetch_row();
        if (is_array($result)) $Post_User = new Post_User(...$result);
        $success = ($result == true) ? "" : "L'article recherché n'existe pas ou a été supprimé";
    }
}

if ($nbrOfArticles > 0) {
    $resultRow = mysqli->query("SELECT * FROM articles WHERE idUser = $idUser");
}