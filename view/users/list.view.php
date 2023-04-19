<?php
$title = 'Les utilisateurs';
ob_start();
?>

<main>
    <a class="btn btn-lg ajouter" href="index.php?controller=users&action=edit&id=new">Ajouter</a>
    <?php if(isset($_SESSION['msg'])) echo'<div class="'. $_SESSION['msg']['css'] .'">' . $_SESSION['msg']['txt'] . '</div>'; ?>
    <table>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['firstname'] . ' ' . @strtoupper($user['lastname']) ?></td>
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
unset($_SESSION['msg']);
require ROOT . '/view/template/default.php';
