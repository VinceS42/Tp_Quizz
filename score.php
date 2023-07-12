<?php
require_once('./utils/db-connect.php');

$query="SELECT u.*,s.*
        FROM users u
        JOIN id_user_score ius ON u.id_user=ius.id_user
        JOIN scores s ON s.id_score=ius.id_score
        ORDER BY s.point DESC
        LIMIT 5";
$stmt=$db->prepare($query);
$stmt->execute();
$scores=$stmt->fetchAll(PDO::FETCH_ASSOC);

include_once('./partials/header.php');
?>

<section>
    <table>
        <thead>
            <tr>
                <th colspan="1">Pseudo</th>
                <th colspan="1">Score</th>
                <th colspan="1">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($stmt->rowCount() > 0) { 
            ?>
                <?php foreach ($scores as $score) { ?>
                <tr data-user="<?= $score['pseudo'] ?>" data-score="<?= $score['point'] ?>" class="playerLine">
                        <td><?php echo $score['pseudo'] ?></td>
                        <td><?php echo $score['point'] ?></td>
                        <td><?php echo $score['dateTime'] ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="3">Aucun score trouvé.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Graphique top 5 joueurs -->
    <canvas id="topBarChart"></canvas>
</section>

<?php

include('partials/footer.php');

?>
