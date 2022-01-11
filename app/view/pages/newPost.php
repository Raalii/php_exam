<?php 
require "../../models/User.php";
session_start();
require "../../controllers/_newPost.php";
$title = "Publier un post";
require "../include/header.php"; ?>



<div class="newPostContainer">
    <form action="" method="post">
        <label for="title">Titre</label> <br>
        <input type="text" name="title" id="title" placeholder="Un titre sympa aller !"> <br>
        <label for="">Description</label> <br>
        <textarea name="description" id="" cols="30" rows="10"></textarea> 
        <!-- <input type="file" name="image"> -->
        <button type="submit">Publier</button>
    </form>
</div>

<p> <?= (!is_null($error)) ? $error : $success; ?> </p>

<?php 
require "../include/footer.php";
?>