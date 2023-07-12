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

array_push($fake, array('fake_reponse' => $question['reponse'])); // il prend les 4 boutons melangés et les positionne aléatoirement
shuffle($fake);
?>

<section class="container question">
    <button data-quizz="play">Jouer</button>
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="text-center"><?php echo $question['question']; ?></h1>
        </div>
    </div>
    <div class="justify-content-center">
        <form action="" method="post">
            <input type="hidden" name="question" value="<?php echo $question['id_question']; ?>">
            <div class="row justify-content-center">
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn btn-primary response"><?php echo $fake[0]['fake_reponse']; ?></button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn btn-primary response"><?php echo $fake[1]['fake_reponse']; ?></button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn btn-primary response"><?php echo $fake[2]['fake_reponse']; ?></button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-block btn btn-primary response"><?php echo $fake[3]['fake_reponse']; ?></button>
                </div>
            </div>
        </form>
    </div>
</section>