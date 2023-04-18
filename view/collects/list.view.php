<?php

    $title = 'Liste des collectes';
    ob_start();
?>

<main>
    <table>
        <thead>
            <tr>
                <th>Collecte</th>
                <th>Date</th>
                <th>Partenaire</th>
                <th>Sponsor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($collects as $collect): ?>
            <tr>
                <td><?= $collect['collect'] ?></td>
                <td><?= $collect['date'] ?></td>
                <td><?= $collect['partner_name']?></td>
                <td><?= $collect['name']?></td>
                <td><a href="">Modifier</a> - <a href="">Modifier</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
$content = ob_get_clean();
require ROOT.'/view/template/default.php';
?>