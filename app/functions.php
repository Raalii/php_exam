<?php
require_once 'config.php';

/**
 * @return bool if they are a result true, otherwise false
 */
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


function checkNbrOfPost(int $idUser) : int {
    $result = mysqli->query("SELECT COUNT(*) FROM articles WHERE idUser = $idUser");
    $result = $result->fetch_row();
    return intval($result[0]);
}
