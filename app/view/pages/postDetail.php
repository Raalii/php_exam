<?php
require "../../models/User.php";
require "../../models/Post.php";
require "../../models/Post_User.php";
session_start();
require "../include/header.php";
require "../../controllers/_postDetail.php";
?>

<?php if (!is_null($Post_User)) : ?>
    <h1><?= $Post_User->getTitle() ?></h1>
        <p> <?= $Post_User->getDescription() ?> </p>
    <p style="margin-top: 5rem;"> Publié le <?= $Post_User->getDateOfPost() ?> par <a href="http://localhost/app/view/pages/account.php?profile=<?= $Post_User->getIdUser() ?>"><?= $Post_User->getUsername() ?></a> </p>
    <?php if ($_SESSION['auth']->getId() === $Post_User->getIdUser()) : ?>
        <form action="" method="POST">
            <input type="hidden" name="articleDetail" value="<?= $Post_User->getIdArticle() ?>">
            <input type="hidden" name="delete" value="delete">
            <button type="submit">Supprimer mon post</button>
        </form>
        <form action="http://localhost/app/view/pages/edit.php" method="POST">
            <input type="hidden" name="idArticle" value="<?= $Post_User->getIdArticle() ?>">
            <button type="submit">editer l'article</button>
        </form>
    <?php endif ?>
<?php else : ?> 
   <p> <?= $success ?></p> <br>
    <a href="/">Maintenant, veuillez revenir à l'acceuil</a>
<?php endif ?>