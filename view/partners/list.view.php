<?php
$title = 'Les parternaires';
ob_start();
?>

<main>
    <a class="btn btn-lg ajouter" href="index.php?controller=partners">Ajouter</a>
    <table>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['firstname'] . ' ' . @strtoupper($user['lastname']) ?></td>
                <td><?= $user['mail'] ?></td>
                <td><?= ($user['is_admin'] === 1) ? 'Admin' : 'Collaborateur' ?></td>
                <td><a href="index.php?controller=partners<?= $user['id_partner'] ?>"><i class="bi bi-pencil fs-3"></i></a>&nbsp;
                    <a href="index.php?controller=partners<?= $user['id_partner'] ?>"><i class="bi bi-trash fs-3"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php $content = ob_get_clean();
unset($_SESSION['msg']);
require ROOT . '/view/template/default.php';