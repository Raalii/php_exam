<?php
require "../../models/User.php";
session_start();
require "../include/header.php";
require "../../controllers/_postDetail.php";
?>

<?php if (is_array($result)) : ?>
    <h1><?= $result[1] ?></h1>
    <!-- <pre> -->
        <p> <?= $result[2] ?> </p>
    <!-- </pre>slither -->
    <p style="margin-top: 5rem;"> Publié le <?= $result[3] ?> par <a href="http://localhost/app/view/pages/account.php?profile=<?= $result[4] ?>"><?= $result[7] ?></a> </p>
    <?php if ($_SESSION['auth']->getId() == intval($result[4])) : ?>
        <form action="" method="POST">
            <input type="hidden" name="articleDetail" value="<?= $result[0] ?>">
            <input type="hidden" name="delete" value="delete">
            <button type="submit">Supprimer mon post</button>
        </form>
    <?php endif ?>
<?php else : ?> 
   <p> <?= $success ?></p> <br>
    <a href="/">Maintenant, veuillez revenir à l'acceuil</a>
<?php endif ?>