<?php
var_dump($title);
$query = "SELECT q.*, fr.fake_reponse
        FROM questions q
        JOIN id_question_reponse iqr ON q.id_question = iqr.id_question /* le premier JOIN permet de lier id_question de la table questions avec le id question de la table id_question_reponse */
        JOIN fake_reponse fr ON fr.id_fake_reponse = iqr.id_fake_reponse /* Le premier JOIN permet de lier id_fake_reponse de la table fake_reponse avec le id fake_reponse de la table id_question_reponse */
        ORDER BY RAND() LIMIT 1"; // On récupère la question au hasard,
$stmt = $db->prepare($query);
$stmt->execute();
$question = $stmt->fetch(PDO::FETCH_ASSOC); // On récupère la question au hasard

$query="SELECT fr.fake_reponse
        FROM fake_reponse fr
        JOIN id_question_reponse iqr ON fr.id_fake_reponse = iqr.id_fake_reponse
        WHERE iqr.id_question = ?
        ORDER BY RAND() LIMIT 3"; // On récupère 3 parmis les 5 réponses au hasard
$stmt = $db->prepare($query);
$stmt->execute([$question['id_question']]);
$fake = $stmt->fetchAll(PDO::FETCH_ASSOC); // On récupère 3 réponses au hasard

array_push($fake, array('fake_reponse' => $question['reponse'])); // il prend les 4 boutons melangés et les positionne aléatoirement
// $fake Correspond au tableau des réponses au hasard
// Le array permet de lier fake_reponse à la bonne réponse
shuffle($fake); // On mélange aléatoirement les 4 réponses au hasard
// var_dump($fake);
var_dump($_SESSION);
?>

<section class="container question">
    <a data-quizz="play">Jouer</a>
    <div class="jsp">
        <p class="life"></p>
        <p class="timer"></p>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 border rounded-4 p-5 mt-5 qstn">
            <h1 class="text-center"><?php echo $question['question']; ?></h1>
        </div>
    </div>
    <div class="justify-content-center">
        <form action="" method="post">
            <input type="hidden" name="question" value="<?php echo $question['id_question']; ?>"><!-- Permet de lier avec le JS -->
            <div class="row justify-content-center mb-5">
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-lg btn-primary response"><?php echo $fake[0]['fake_reponse']; ?></button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-lg btn-danger response"><?php echo $fake[1]['fake_reponse']; ?></button>
                </div>
            </div>
            <div class="row justify-content-center mt-5 mb-4">
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-lg btn-success response"><?php echo $fake[2]['fake_reponse']; ?></button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn-lg btn-warning response text-white"><?php echo $fake[3]['fake_reponse']; ?></button>
                </div>
            </div>
        </form>
    </div>
</section>
