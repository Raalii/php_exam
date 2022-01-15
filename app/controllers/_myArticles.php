<?php 
require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'functions.php');
require_once(dirname(__FILE__, 1) . DIRECTORY_SEPARATOR . '_postDetail.php');
$idUser = $_SESSION['auth']->getId();
$nbrOfArticles = checkNbrOfPost($idUser);
$result = null;



if ($nbrOfArticles > 0) {
    $result = mysqli->query("SELECT * FROM articles WHERE idUser = $idUser");
}