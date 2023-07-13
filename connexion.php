<?php

include_once('./partials/header.php');
require_once('./utils/db-connect.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') { // si la requête est de type POST
    if(!empty($_POST['pseudo'])) { // si le pseudo est différent de vide

        $pseudo = $_POST['pseudo']; // on récupère le pseudo

        $query = "SELECT * FROM users WHERE pseudo = :pseudo"; // recherche de l'utilisateur
        $stmt = $db->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo); // on remplace :pseudo par $pseudo
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // on récupère toutes les lignes de la table users
        // var_dump($result);

        if (count($result) > 0) { // si l'utilisateur existe déjà
            $_SESSION['pseudo'] = $pseudo; // on enregistre le pseudo dans la session
            // var_dump($_SESSION);
            header("Location: index.php");
        } else { // si l'utilisateur n'existe pas
            $query = "INSERT INTO users (pseudo) VALUES (:pseudo)"; // si l'utilisateur n'existe pas
            $stmt = $db->prepare($query);
            $stmt->bindParam(':pseudo', $pseudo); // on remplace :pseudo par $pseudo
            $stmt->execute();
            $_SESSION['pseudo'] = $pseudo; // on enregistre le pseudo dans la session
            // var_dump($_SESSION);
            header("Location: index.php");
            exit();
        }
    } else { // si le pseudo est vide
        echo "Rentre un pseudo putain tu fais chier là";
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
