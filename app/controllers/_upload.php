<?php 
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