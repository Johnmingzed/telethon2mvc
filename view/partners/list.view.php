<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Les parternaires';
ob_start();
?>

<main>
    <a class="btn btn-lg btn-add" href="index.php?controller=partners&action=add">Ajouter</a>
    <table>
        <?php foreach ($partners as $partner) : ?>
            <tr>
                <td><?= $partner['firstname'] . ' ' . @strtoupper($partner['lastname']) ?></td>
                <td><?= $partner['mail']?></td>
                <td><?= $partner['phone']?></td>
                <td><?= $partner['name']?></td>
                <td><a href="index.php?controller=partners&action=edit&id=<?= $partner['id_partner'] ?>"><i class="bi bi-pencil fs-3"></i></a>&nbsp;
                    <a href="index.php?controller=partners&action=delete&id=<?= $partner['id_partner'] ?>"><i class="bi bi-trash fs-3"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';