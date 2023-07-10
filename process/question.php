<?php
$query = "SELECT q.*, fr.fake_reponse
        FROM questions q
        JOIN id_question_reponse iqr ON q.id_question = iqr.id_question
        JOIN fake_reponse fr ON fr.id_fake_reponse = iqr.id_fake_reponse
        ORDER BY RAND() LIMIT 1";
$stmt = $db->prepare($query);
$stmt->execute();
$question = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT fr.fake_reponse
        FROM fake_reponse fr
        JOIN id_question_reponse iqr ON fr.id_fake_reponse = iqr.id_fake_reponse
        WHERE iqr.id_question = ?
        ORDER BY RAND() LIMIT 3";
$stmt = $db->prepare($query);
$stmt->execute([$question['id_question']]);
$fake = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section>
    <button data-quizz="play">Jouer</button>
    <div>
        <h1><?php echo $question['question']; ?></h1>
    </div>
    <div>
        <button><?php echo $question['reponse']; ?></button>
    </div>
    <?php foreach ($fake as $fakeReponse) : ?>
        <div>
            <button><?php echo $fakeReponse['fake_reponse']; ?></button>
        </div>
    <?php endforeach; ?>
</section>