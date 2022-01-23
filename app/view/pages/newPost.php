<div class="newPostContainer">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Titre</label> <br>
        <input type="text" name="title" id="title" placeholder="Un titre sympa aller !"> <br>
        <label for="">Description</label> <br>
        <textarea name="description" id="" cols="30" rows="10"></textarea> 
        <label>Select Image File:</label>
        <input type="file" name="image" style="color: white;"> <br>
        <button type="submit">Publier</button>
    </form>
</div>
<p><?= !empty($statusMsg) ? $statusMsg : "" ?></p>
<p> <?= (!is_null($error)) ? $error : $success; ?> </p>