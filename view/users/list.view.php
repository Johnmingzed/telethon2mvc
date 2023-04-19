<?php
$title = 'Les utilisateurs';
ob_start();
?>

<main>
    <a class=button_add href="index.php?controller=users&action=add">Ajouter</a>

    <table>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['firstname'] . ' ' . strtoupper($user['lastname']) ?></td>
                <td><?= $user['mail'] ?></td>
                <td><?= ($user['is_admin'] === 1) ? 'Admin' : 'Collaborateur' ?></td>
                <td><a href="index.php?controller=users&action=edit&id=<?= $user['id_user'] ?>">modifier</a>&nbsp;
                    <a href="index.php?controller=users&action=delete&id=<?= $user['id_user'] ?>">supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php $content = ob_get_clean();

require ROOT . '/view/template/default.php';
