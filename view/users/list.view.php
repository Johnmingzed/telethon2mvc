<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Utilisateurs';
ob_start();
?>

<a class="btn btn-lg btn-add" href="index.php?controller=users&action=edit&id=new">Ajouter</a>
<table class="table table-hover">
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><img src="../public/images/<?=  $user['picture'] ?>" alt=""></td>
            <td><?= @htmlentities($user['firstname']) . ' ' . @htmlentities(strtoupper($user['lastname'])) ?></td>
            <td><?= @htmlentities(strtolower($user['mail'])) ?></td>
            <td><?= ($user['is_admin'] === 1) ? 'Admin' : 'Collaborateur' ?></td>
            <td class="text-end">
                <a href="index.php?controller=users&action=edit&id=<?= $user['id_user'] ?>" title="Modifier"><i class="bi bi-pencil fs-4"></i></a>&nbsp;
                <a href="index.php?controller=users&action=delete&id=<?= $user['id_user'] ?>" title="Supprimer"><i class="bi bi-trash fs-4"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<script src="../../public/js/users.js"></script>
<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
