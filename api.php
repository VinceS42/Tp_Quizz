<?php

require_once('./utils/db-connect.php');

function getGoodResponse($database) {
    $questionIdIsOk = (isset($_GET['question']) && !empty($_GET['question'])); // Regarde que l'utilisateur a renseigné un id de question

    if ($questionIdIsOk) { // Si l'utilisateur a renseigné un id de question
        $request = $database->prepare('SELECT reponse FROM questions WHERE id_question = :question;');
        $request->bindValue(':question', $_GET['question'], PDO::PARAM_INT);
        $request->execute();

        $rawResponse = $request->fetch(PDO::FETCH_ASSOC); // Récupère la reponse de l'utilisateur

        echo json_encode($rawResponse); // Envoie la reponse de l'utilisateur

    } else { // Si l'utilisateur n'a pas renseigné un id de question
        echo json_encode('J\'ai besoin que tu m\'envoie $_GET[\'question\'] pour traiter ta demande.'); // Envoie un message d'erreur
    }
}

getGoodResponse($db); // Appelle de la fonction getGoodResponse

?>
