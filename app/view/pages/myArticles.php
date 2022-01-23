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
        <form action="<?= BASE_URL ?>/myArticles/edit" method="POST">
            <input type="hidden" name="idArticle" value="<?= $currentPost->getIdArticle() ?>">
            <button type="submit">editer l'article</button>
        </form>
    </div>
    <?php endwhile ?>

<?php else : ?> 
    <h1>Oups ! Vous n'avez pas crée d'Article. Vous pouvez <a href="<?= BASE_URL ?>/articles/new">en créer un ici</a> </h1>
<?php endif;


