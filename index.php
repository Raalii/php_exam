<?php
require './app/models/User.php';
session_start();
require './app/functions.php';
echo redirectUserAccordingToStateOfSession();
require './app/view/include/header.php';
?>


<pre>
    <h1 style="color : white"> Bienvenue, <?= (isset($_SESSION['auth']) ? $_SESSION['auth']->getUsername() : "invité"); ?> </h1>
</pre>