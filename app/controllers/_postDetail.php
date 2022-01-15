<?php
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
$choice = (empty($_GET['articleDetail'])) ? null : $_GET['articleDetail'];
$delete = (empty($_POST['delete'])) ? null : $_POST['delete'];
$success = null;
$result = null;

if (!is_null($choice)) {
    if (!is_null($delete)) {
        $result = mysqli->query("DELETE FROM articles WHERE idArticle = $choice");
        $success = ($result == true) ? "L'article a bien été supprimé" : "Il y a eu une erreur lors de la suppression de votre article. Veuillez retry stp";
    } else {
        $result = mysqli->query("SELECT * FROM articles INNER JOIN user ON user.id = articles.idUser WHERE idArticle = $choice");
        $result = $result->fetch_row();
        $success = ($result == true) ? "" : "L'article recherché n'existe pas ou a été supprimé";
    }
}
