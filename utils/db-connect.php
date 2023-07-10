<?php
function dbConnect() {
    $address = 'localhost'; // Modifiez ici par 'localhost'.
    $dns = 'mysql:host=' . $address . ';dbname=quizz';
    $user = 'root';
    $password = '';
    $db=NULL;

    try {
        $db = new PDO($dns, $user, $password);

    } catch (Exception $error) {
        echo '<p>Une erreur est survenue.</p>';

        var_dump($error);
    }

    return $db;
}
?>