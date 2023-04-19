<?php
$title = 'Utilisateurs';
ob_start();
?>

<main>
    <?php if(isset($_SESSION['msg'])) echo '<div class="message">' . $_SESSION['msg']['txt'] . '</div>';
    if ($_GET['id'] == 'new') : ?>
        <form action="index.php?controller=users&action=add" method="post">
        <?php else : ?>
            <form action="index.php?controller=users&action=update&id=<?= @htmlentities($user['id_user']) ?>" method="post">
            <?php endif; ?>

            <div class="input">
                <label for="lastname">Nom : </label>
                <input type="text" name="lastname" id="lastname" value="<?= @htmlentities($user['lastname']) ?>">
            </div>
            <div class="input">
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname" value="<?= @htmlentities($user['firstname']) ?>">
            </div>
            <div class="input">
                <label for="mail">E-mail : </label>
                <input type="email" name="mail" id="mail" value="<?= @htmlentities($user['mail']) ?>" required>
            </div>
            <div class="password">
                <span>Mot de passe : </span>
                <?php
                if (!empty($user['mot_de_passe'])) {
                    echo '<span class="pw_active">ACTIF</span>';
                } else {
                    echo '<span class="pw_inactive">INACTIF</span>';
                }
                ?>
            </div>
            <div class="id_admin">
                <label for="id_admin">Administrateur </label>
                <input type="checkbox" name="is_admin" id="is_admin" <?= @($user['is_admin'] === 1) ? 'checked' : '' ?>>
            </div>
            <input type="submit" value="<?= @($_GET['id'] == 'new') ? 'Ajouter' : 'Modifier' ?>">
            <a class="button" href="index.php?controller=users&action=list">Annuler</a>
            </form>
            <?php if ($_GET['id'] != 'new') : ?>
                <a class="button" href="index.php?controller=users&action=pw_reset&id=<?= $user['id_user']; ?>">Changer le mot de passe</a>
            <?php endif; ?>
</main>

<?php $content = ob_get_clean();
unset($_SESSION['msg']);
require ROOT . '/view/template/default.php';
