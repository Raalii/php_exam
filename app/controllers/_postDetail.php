<?php 
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
$choice = (empty($_POST['articleDetail'])) ? null : $_POST['articleDetail'];

if (!is_null($choice)) {
    $result = mysqli->query("SELECT * FROM articles INNER JOIN user ON user.id = articles.idUser WHERE idArticle = $choice");
    $result = $result->fetch_row();
}

