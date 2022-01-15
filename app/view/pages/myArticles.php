<?php 
require "../../models/User.php";
session_start();
require "../../controllers/_myArticles.php";
require "../include/header.php";



?>

<?php if (!is_null($result)) : ?>
    <h1>Nombre total d'article : <?= $nbrOfArticles ?></h1>
    
    <?php while($row = $result->fetch_row()) : ?>
        <div class="container" style="border: 0.5px #1f1f1f solid;margin-bottom:2px">
        <h3>Titre : <?= $row[1] ?></h3>
        <p><?= $row[2] ?></p>
        <p style="color: wheat;">Publié le <?= $row[3] ?></p>
        <form action="" method="POST">
            <input type="hidden" name="articleDetail" value="<?= $row[0] ?>">
            <input type="hidden" name="delete" value="delete">
            <button type="submit">Supprimer mon post</button>
        </form>
        <form action="http://localhost/app/view/pages/edit.php" method="POST">
            <input type="hidden" name="idArticle" value="<?= $row[0] ?>">
            <button type="submit">editer l'article</button>
        </form>
    </div>
    <?php endwhile ?>

<?php else : ?> 
    <h1>Oups ! Vous n'avez pas crée d'Article. Vous pouvez <a href="http://localhost/app/view/pages/newPost.php">en créer un</a> </h1>
<?php endif ?>

<?php
require "../include/footer.php";