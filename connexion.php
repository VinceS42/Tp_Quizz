<?php
require_once('../utils/db-connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];

    $query = "SELECT * FROM users WHERE pseudo = '$pseudo'";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();;

    if (mysqli_num_rows($result) > 0) {
        header("Location: index.php");
        exit();
    } else {
        $query = "INSERT INTO users (pseudo) VALUES ('$pseudo')";
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