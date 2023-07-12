<?php

require_once('./utils/db-connect.php');

function getGoodResponse($database) {
    $questionIdIsOk = (isset($_GET['question']) && !empty($_GET['question']));

  
    if ($questionIdIsOk) {
        $request = $database->prepare('SELECT reponse FROM questions WHERE id_question = :question;');
        $request->bindValue(':question', $_GET['question'], PDO::PARAM_INT);
        $request->execute();

        $rawResponse = $request->fetch(PDO::FETCH_ASSOC);

        echo json_encode($rawResponse);

    } else {
        echo json_encode('J\'ai besoin que tu m\'envoie $_GET[\'question\'] pour traiter ta demande.');
    }
}

getGoodResponse($db);

?>
