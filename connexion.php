<?php
require_once('./utils/db-connect.php');

include_once('./partials/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];

    $query = "SELECT * FROM users WHERE pseudo = :pseudo";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);

    if (count($result) > 0) {
        $_SESSION['pseudo'] = $pseudo;
        header("Location: index.php");
    } else {
        $query = "INSERT INTO users (pseudo) VALUES (:pseudo)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $_SESSION['pseudo'] = $pseudo;
        header("Location: index.php");
        exit();
    }
}
?>
<section class="container-fluid">
    <div class="row justify-content-center">
        <div class="bg-test col-6 mt-5 mb-5 p-5 rounded-4">
            <form method="POST" class="text-center">
                <input type="text" name="pseudo" class=" input form-control mb-5" size="80" placeholder="Votre pseudo">
                <button type="submit" name="connexion" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
</section>


<?php
include_once('./partials/footer.php');
?>