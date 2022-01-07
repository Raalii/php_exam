<?php
require_once '../../functions.php';
$result = null;
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $result = $_POST['email'];
}
var_dump($result);





?>

<h1>Se connecter</h1>

<form action="" method="post">
    <input type="email" name="email" id="email" placeholder="mail"> <br>
    <input type="password" name="password" id="password" placeholder="entrez le mot de passe">
    <button type="submit">Valider</button>
</form>




<h2>Pas de compte ? <a href="./register.php"> S'inscrire</a></h2>