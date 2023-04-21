<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Les utilisateurs';
ob_start();
?>

<a class="btn btn-lg btn-add" href="index.php?controller=users&action=edit&id=new">Ajouter</a>
<table>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><img src="../public/images/<?=  $user['picture'] ?>" alt=""></td>
            <td><?= $user['firstname'] . ' ' . @strtoupper($user['lastname']) ?></td>
            <td><?= $user['mail'] ?></td>
            <td><?= ($user['is_admin'] === 1) ? 'Admin' : 'Collaborateur' ?></td>
            <td><a href="index.php?controller=users&action=edit&id=<?= $user['id_user'] ?>"><i class="bi bi-pencil fs-3"></i></a>&nbsp;
                <a href="index.php?controller=users&action=delete&id=<?= $user['id_user'] ?>"><i class="bi bi-trash fs-3"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
