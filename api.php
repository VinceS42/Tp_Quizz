<?php

require_once('utils/db-connect.php');

function getGoodResponse() {
    $questionIdIsOk = (isset($_POST['question']) && !empty($_POST['question']));

    if ($questionIdIsOk) {
        $request = $db->prepare('SELECT reponse FROM questions WHERE id_question = :question;');
        $request->bindValue(':question', $_POST['question'], PDO::PARAM_INT);
        $request->execute();

        $rawResponse = $request->fetch();

        echo json_encode($rawResponse);

    } else {
        echo json_encode('J\'ai besoin que tu m\'envoie $_POST[\'question\'] pour traiter ta demande.');
    }
}

getGoodResponse();

?>
