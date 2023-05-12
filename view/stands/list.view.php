<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    $title = 'Stands';
    ob_start();
?>
<a class="btn btn-lg btn-add" href="index.php?controller=stands&action=add">Ajouter</a>
<table class="table table-hover table-striped">
    <thead>
        
        <th class="text-start">Nom du stand</th>
        <th class="text-start">Adresse</th>
        <th><!--Logo--></th>
        <th><!--Action--></th>
    </thead>
    <?php foreach($listStands as $listStand) : ?>
        <tr>            
            <td><?= $listStand['name'] ?></td>
            <td><?= $listStand['place'] ?></td>
            <td><img src='../public/images/<?= $listStand['picture'] ?>' alt=""></td>
            <td class="text-end">
                <a href="index.php?controller=stands&action=update&id=<?= $listStand['id_stand'] ?>"><i class="bi bi-pencil fs-4"></i></a>
                <a href="index.php?controller=stands&action=delete&id=<?= $listStand['id_stand'] ?>"><i class="bi bi-trash fs-4"></i></a>
            </td>
        </tr>
    <?php endforeach ; ?>
</table>
<?php
    $content = ob_get_clean();
    require ROOT.'/view/template/default.php';
?>