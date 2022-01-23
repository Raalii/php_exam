<?php
// require_once(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'config.php');
$description = (empty($_POST['description'])) ? null : $_POST['description'];
$titlePost = (empty($_POST['title'])) ? null : $_POST['title'];
$error = null;
$success = null;

if (!is_null($description) && !is_null($titlePost)) {
    // Security to avoid sql injection
    $description = htmlspecialchars($description);
    $titlePost = htmlspecialchars($titlePost);
    mysqli->query("INSERT INTO articles (title, description, dateOfPost, idUser)
    VALUES (\"$titlePost\", \"$description\", NOW(), " . $_SESSION['auth']->getId()  . ") ;");
    $success = "Votre post est bien publié";
} else {
    $error = "Veuillez compléter tout les champs !";
}
if (!empty($_FILES["image"]["name"]) && $success) {
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array(strtolower($fileType), $allowTypes)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Insert image content into database 
        $insert = mysqli->query("UPDATE articles set image = '$imgContent' WHERE idArticle = (SELECT idArticle FROM articles ORDER BY idArticle DESC LIMIT 1)");

        if ($insert) {
            $status = 'success';
            $statusMsg = "File uploaded successfully.";
        } else {
            $statusMsg = "File upload failed, please try again.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
} else {
    $success = null;
    $error = "Veuillez compléter tout les champs !";
}