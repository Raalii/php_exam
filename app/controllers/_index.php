<?php 

$result = mysqli->query("SELECT * from articles ORDER BY dateOfPost DESC");
$haveResult = false;
