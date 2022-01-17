<?php
require "../../models/User.php";
require "../../models/Post.php";
require "../../models/Post_User.php";
session_start();
require "../../controllers/_admin.php";
require "../include/header.php";
?>


<?php if ($_SESSION['auth']->getType() != 'Admin') : ?>
    <h1>Vous n'êtes pas autorisé à accéder à cette page. Veuillez retourner au <a href="/">menu principal</a> </h1>
<?php else :  ?>
    <h1>Bienvenue cher Admin !</h1>
    <p style="color: <?= $deletePostColor ?>;"><?= ($deletePostSuccess) ? $deletePostSuccess : $deletePostError ?> </p>
    <p style="color: <?= $deleteUserColor ?>;"><?= ($deleteUserSuccess) ? $deleteUserSuccess : $deleteUserError ?> </p>
    <div class="allContainer" style="margin-top: 5cm;">

        <div class="profileContainer">
            <h2>Tout les utilisateurs</h2>
            <ul>
                <?php while ($row = $resultUser->fetch_row()) : ?>
                    <?php $currentUser = new User(...$row) ?>
                    <div class="userContent" style="margin-bottom: 2rem;">

                        <li id="user_<?= $currentUser->getId() ?>" style="color: white;"> <?= $currentUser->getEmail() ?> : <?= $currentUser->getUsername() ?> : </li>
                        <form action="" method="POST">
                            <input type="hidden" name="deleteUser" value="<?= $currentUser->getId() ?>">
                            <button>Supprimer cet utilisateur </button> <label for="" style="font-size: 0.8rem;"> (ainsi que tout ses postes)</label>
                        </form>
                    </div>
                <?php endwhile ?>

            </ul>

        </div>


        <div class="postContainer">
            <h2>Tout les posts</h2>
            <ul>
                <?php while ($row = $resultPost->fetch_row()) : ?>
                    <?php $currentPost = new Post_User(...$row) ?>
                    <li>
                        <?php var_dump($row) ?>
                    </li>
                    <div class="postContent">
                        <li>Titre : <?= $currentPost->getTitle() ?></li>
                        <li>Description : <?= $currentPost->getDescription() ?> </li>
                        <li>Fait par <a href="#user_<?= $currentPost->getIdUser() ?>"><?= $currentPost->getUsername() ?></a></li>
                        <form action="" method="POST">
                            <input type="hidden" name="deletePost" value="<?= $currentPost->getIdArticle() ?>">
                            <button>Supprimer ce post</button>
                        </form>
                    </div>
                <?php endwhile ?>
            </ul>

        </div>
    </div>
<?php endif ?>


<?php require "../include/footer.php" ?>