<?php
require_once('./utils/db-connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];

    $query = "SELECT * FROM users WHERE pseudo = :pseudo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);

    if (count($result) > 0) {
        header("Location: index.php");
    } else {
        $query = "INSERT INTO users (pseudo) VALUES (:pseudo)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}
?>
<section>
    <form method="POST">
        <input type="text" name="pseudo" placeholder="Votre pseudo">
        <button type="submit" name="connexion">Se connecter</button>
    </form>
</section>