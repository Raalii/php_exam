<?php
require "../../models/User.php";
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
                    <div class="userContent" style="margin-bottom: 2rem;">

                        <li id="user_<?= $row[0] ?>" style="color: white;"> <?= $row[1] ?> : <?= $row[2] ?> : <?= $row[4] ?> </li>
                        <form action="" method="POST">
                            <input type="hidden" name="deleteUser" value="<?= $row[0] ?>">
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
                    <li>
                        <?php var_dump($row) ?>
                    </li>
                    <div class="postContent">
                        <li>Titre : <?= $row[1] ?></li>
                        <li>Description : <?= $row[2] ?> </li>
                        <li>Fait par <a href="#user_<?= $row[5] ?>"><?= $row[7] ?></a></li>
                        <form action="" method="POST">
                            <input type="hidden" name="deletePost" value="<?= $row[0] ?>">
                            <button>Supprimer ce post</button>
                        </form>
                    </div>
                <?php endwhile ?>
            </ul>

        </div>
    </div>
<?php endif ?>


<?php require "../include/footer.php" ?>