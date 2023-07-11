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

array_push($fake, array('fake_reponse'=>$question['reponse']));
shuffle($fake);
?>

<section>
    <button data-quizz="play">Jouer</button>
    <div>
        <h1><?php echo $question['question']; ?></h1>
        <input type="hidden" value="<?php echo $question['id_question']; ?>">
    </div>
    <?php for ($i = 0; $i < count($fake); $i++) : ?>
        <div>
            <button><?php echo $fake[$i]['fake_reponse']; ?></button>
        </div>
    <?php endfor; ?>
</section>