<?php
function dbConnect() {
    $address = '172.16.238.12'; // Modifiez ici par 'localhost'.
    $dns = 'mysql:host=' . $address . ';dbname=quizz';
    $user = 'root';
    $password = '';
    $db;

    try {
        $db = new PDO($dns, $user, $password);

    } catch (Exception $error) {
        echo '<p>Une erreur est survenue.</p>';

        var_dump($error);
    }

    return $db;
}

?>
