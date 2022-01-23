

<?php if (!is_null($success) || !(is_null($error))) : ?>
        <p style="color:<?= $colorMsg ?>"><?= ($success) ? $success : $error  ?></p>
<?php endif ?>
<?php if (!is_null($postToShow)) : ?>
        <form action="" method="post">
                <input type="hidden" name="idArticle" value="<?= $postToShow->getIdArticle(); ?>">
                <label for="title">Titre</label> <br>
                <input type="text" name="titleMod" id="title" placeholder="Un titre sympa aller !" value="<?= $postToShow->getTitle() ?>"> <br>
                <label for="">Description</label> <br>
                <textarea name="descriptionMod" id="" cols="100" rows="20"><?= $postToShow->getDescription() ?></textarea>
                <input type="file" name="image">
                <button type="submit">Appliquer les modifications</button>
        </form>
<?php else : ?>
        <h1>Oups, il semblerait qu'il y a un problème</h1>
<?php endif ?>