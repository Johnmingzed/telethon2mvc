<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    $title = 'Stands';
    ob_start();
?>
<a class="btn btn-lg btn-add" href="index.php?controller=stands&action=add">Ajouter</a>
<table>
    <tr>
        <th>Logo</th>
        <th>Nom du stand</th>
        <th>Localisation</th>
        <th>Action</th>
    </tr>
    <?php foreach($listStands as $listStand) : ?>
        <tr>
            <td><img src='../public/images/<?= $listStand['picture'] ?>' alt=""></td>
            <td><?= $listStand['name'] ?></td>
            <td><?= $listStand['place'] ?></td>
            <td>
                <a href="index.php?controller=stands&action=update&id=<?= $listStand['id_stand'] ?>"><i class="bi bi-pencil fs-3"></i></a>
                <a href="index.php?controller=stands&action=delete&id=<?= $listStand['id_stand'] ?>"><i class="bi bi-trash fs-3"></i></a>
            </td>
        </tr>
    <?php endforeach ; ?>
</table>
<?php
    $content = ob_get_clean();
    require ROOT.'/view/template/default.php';
?>