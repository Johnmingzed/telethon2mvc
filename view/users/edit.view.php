<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Utilisateurs';
ob_start();

if ($_GET['id'] == 'new') : ?>
    <form action="index.php?controller=users&action=add" method="post" enctype="multipart/form-data">
    <?php else : ?>
        <form action="index.php?controller=users&action=update&id=<?= @htmlentities($user['id_user']) ?>" method="post" enctype="multipart/form-data">
        <?php endif; ?>
        <div class="mb-3">
            <img class="profil_picture" src="../../public/images/<?= $user['picture']; ?>" alt="">
        </div>
        <div class="input mb-3">
            <input type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/webp">
        </div>
        <div class="input mb-3">
            <label class="name" for="lastname">Nom : </label>
            <input class="form-control" type="text" name="lastname" id="lastname" value="<?= @htmlentities($user['lastname']) ?>">
        </div>
        <div class="input mb-3">
            <label class="name" for="firstname">Prénom : </label>
            <input class="form-control" type="text" name="firstname" id="firstname" value="<?= @htmlentities($user['firstname']) ?>">
        </div>
        <div class="input mb-3">
            <label class="name" for="mail">E-mail : </label>
            <input class="form-control" type="email" name="mail" id="mail" value="<?= @htmlentities($user['mail']) ?>" required>
        </div>
        <div class="password mb-3">
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
        <input type="submit" class="btn btn-lg btn-add" value="<?= @($_GET['id'] == 'new') ? 'Ajouter' : 'Modifier' ?>">
        <a class="btn btn-lg btn-cancel" href="index.php?controller=users&action=list">Annuler</a>
        </form>
        <?php if ($_GET['id'] != 'new') : ?>
            <div class="mb-3"><a class="button" href="index.php?controller=users&action=pw_reset&id=<?= $user['id_user']; ?>">Changer le mot de passe</a></div>
        <?php endif; ?>


        <?php $content = ob_get_clean();
        require ROOT . '/view/template/default.php';
