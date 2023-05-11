<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 * @author Anh
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Partenaires';
ob_start();
?>

<a class="btn btn-lg btn-add" href="index.php?controller=partners&action=add">Ajouter</a>

<table class="table table-hover table-striped">
    <thead>
        <th class="text-start">Partenaire</th>
        <th class="text-start">Contact</th>
        <th class="text-start">Email</th>
        <th class="text-start">Tel.</th>
        <th></th>
    </thead>
    <?php foreach ($partners as $partner) : ?>
        <tr>
            <td><?= $partner['name'] ?></td>    
            <td><?= $partner['firstname'] . ' ' . @strtoupper($partner['lastname']) ?></td>
            <td><?= strtolower($partner['mail']) ?></td>
            <td><?= $partner['phone'] ?></td>            
            <td class="text-end">
                <a href="index.php?controller=partners&action=edit&id=<?= $partner['id_partner'] ?>" title="Modifier"><i class="bi bi-pencil fs-4"></i></a>&nbsp;
                <a href="index.php?controller=partners&action=delete&id=<?= $partner['id_partner'] ?>" title="Supprimer"><i class="bi bi-trash fs-4"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script src="../../public/js/partner.js"></script>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
