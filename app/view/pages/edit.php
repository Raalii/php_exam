<?php 
require "../../models/User.php";
session_start();
// require "../../controllers/_myArticles.php";
require "../include/header.php";
require "../../controllers/_edit.php";
?>
<?php if (!is_null($success) || !(is_null($error))) : ?>
<p style="color:<?= $colorMsg ?>"><?= ($success) ? $success : $error  ?></p>
<?php endif ?>
<?php ?>
<form action="" method="post">
        <input type="hidden" name="idArticle" value="<?= $result[0] ?>">
        <label for="title">Titre</label> <br>
        <input type="text" name="titleMod" id="title" placeholder="Un titre sympa aller !" value="<?= $result[1] ?>"> <br>
        <label for="">Description</label> <br>
        <textarea name="descriptionMod" id="" cols="30" rows="10"><?= $result[2] ?></textarea> 
        <!-- <input type="file" name="image"> -->
        <button type="submit">Appliquer les modifications</button>
</form>