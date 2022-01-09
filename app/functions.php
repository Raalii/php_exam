<?php
require_once 'config.php';

function checkDuplicateValueInColumn(string $table, string $column, string $value): bool
{
    $result = mysqli->query("SELECT * from $table WHERE $column = '$value';");
    return !empty($result->fetch_all());
}


function checkIfUserIsConnected() : bool {
    return !empty($_SESSION['auth']);
}


function redirectUserAccordingToStateOfSession() {
    if (!checkIfUserIsConnected()) return <<<HTML
        <script>window.top.location = "http://localhost/app/view/pages/login.php"</script>
HTML;
}
