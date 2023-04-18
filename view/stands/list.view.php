<?php
    $title = 'Liste des stands';
    ob_start();
?>
<main>
    <table>
        <tr>
            <th>Nom du stand</th>
            <th>Localisation</th>
        </tr>
        <?php foreach($listStands as $listStand) : ?>
            <tr>
                <td><?= $listStand['name'] ?></td>
                <td><?= $listStand['place'] ?></td>
            </tr>
        <?php endforeach ; ?>
    </table>
</main>
<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>