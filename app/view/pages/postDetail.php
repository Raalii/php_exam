<?php if (!is_null($Post_User)) : ?>
    <?php if (!empty($Post_User->getImage())) {
        $url = "data:image/jpg;charset=utf8;base64," . base64_encode($Post_User->getImage());
    } else {
        $url = "https://images.unsplash.com/photo-1504610926078-a1611febcad3?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e1c8fe0c9197d66232511525bfd1cc82&auto=format&fit=crop&w=1100&q=80";
    }
    ?>
    <img src="<?= $url ?>" class="mask">
    <h1><?= $Post_User->getTitle() ?></h1>
    <p> <?= $Post_User->getDescription() ?> </p>
    <p style="margin-top: 5rem;"> Publié le <?= $Post_User->getDateOfPost() ?> par <a href="profile-<?= $Post_User->getIdUser() ?>"><?= $Post_User->getUsername() ?></a> </p>
    <?php if ($_SESSION['auth']->getId() === $Post_User->getIdUser() || $_SESSION['auth']->getType() == 'Admin' ): ?>
        <form action="" method="POST">
            <input type="hidden" name="articleDetail" value="<?= $Post_User->getIdArticle() ?>">
            <input type="hidden" name="delete" value="delete">
            <button type="submit">Supprimer ce post</button>
        </form>
        <form action="<?= BASE_URL ?>/myArticles/edit" method="POST">
            <input type="hidden" name="idArticle" value="<?= $Post_User->getIdArticle() ?>">
            <button type="submit">editer l'article</button>
        </form>
    <?php endif ?>
<?php else : ?>
    <p> <?= $success ?></p> <br>
    <a href="<?= BASE_URL ?>/">Maintenant, veuillez revenir à l'acceuil</a>
<?php endif ?>