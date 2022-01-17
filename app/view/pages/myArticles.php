<?php 
require "../../models/User.php";
require "../../models/Post.php";
session_start();
require "../../controllers/_myArticles.php";
require "../include/header.php";
?>

<?php if (!is_null($result)) : ?>
    <h1>Nombre total d'article : <?= $nbrOfArticles ?></h1>
    
    <?php while($row = $result->fetch_row()) : ?>
        <?php $currentPost = new Post(...$row); ?>
        <div class="container" style="border: 0.5px #1f1f1f solid;margin-bottom:2px">
        <h3>Titre : <?= $currentPost->getTitle() ?></h3>
        <p><?= $currentPost->getDescription() ?></p>
        <p style="color: wheat;">Publié le <?= $currentPost->getDateOfPost() ?></p>
        <form action="" method="POST">
            <input type="hidden" name="articleDetail" value="<?= $currentPost->getIdArticle() ?>">
            <input type="hidden" name="delete" value="delete">
            <button type="submit">Supprimer mon post</button>
        </form>
        <form action="http://localhost/app/view/pages/edit.php" method="POST">
            <input type="hidden" name="idArticle" value="<?= $currentPost->getIdArticle() ?>">
            <button type="submit">editer l'article</button>
        </form>
    </div>
    <?php endwhile ?>

<?php else : ?> 
    <h1>Oups ! Vous n'avez pas crée d'Article. Vous pouvez <a href="http://localhost/app/view/pages/newPost.php">en créer un ici</a> </h1>
<?php endif ?>

<?php
require "../include/footer.php";