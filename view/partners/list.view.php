<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 * @author Anh
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Les partenaires';
ob_start();
?>

<a class="btn btn-lg btn-add" href="index.php?controller=partners&action=add">Ajouter</a>

<table class="table table-hover table-striped">
    <?php foreach ($partners as $partner) : ?>
        <tr>
            <td><?= $partner['firstname'] . ' ' . @strtoupper($partner['lastname']) ?></td>
            <td><?= strtolower($partner['mail']) ?></td>
            <td><?= $partner['phone'] ?></td>
            <td><?= $partner['name'] ?></td>
            <td><a href="index.php?controller=partners&action=edit&id=<?= $partner['id_partner'] ?>"><i class="bi bi-pencil fs-3"></i></a>&nbsp;
                <a href="index.php?controller=partners&action=delete&id=<?= $partner['id_partner'] ?>"><i class="bi bi-trash fs-3"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script src="../../public/js/partner.js"></script>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
