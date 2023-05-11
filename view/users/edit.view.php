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
    
    <div id="profilePreview" style="width:160px">
        <img src="images/user_image_1.png" alt="default profile pic" id="profilepic" style="max-width:100%">
    </div>
    
    <form action="index.php?controller=users&action=add" method="post" enctype="multipart/form-data">
    
<?php else : ?>

    <form action="index.php?controller=users&action=update&id=<?= $user['id_user'] ?>" method="post" enctype="multipart/form-data">

    <div class="mb-3" style="width:160px">
        <img class="profil_picture" id="profilepic" src="../../public/images/<?= $user['picture']; ?>" alt="" style="max-width:100%">
    </div>

<?php endif; ?>


    <div class="input mb-3">
        <input type="file" id="picture" name="picture" accept="image/png, image/jpeg, image/webp">
    </div>
    <div class="input mb-3">
        <label class="name" for="lastname">Nom : </label>
        <input class="form-control" type="text" name="lastname" id="lastname" pattern="^[A-Za-zÀ-Ÿ '-]+$" maxlenght="30" value="<?= @htmlentities($user['lastname']) ?>">
    </div>
    <div class="input mb-3">
        <label class="name" for="firstname">Prénom : </label>
        <input class="form-control" type="text" name="firstname" id="firstname" pattern="^[A-Za-zÀ-Ÿ '-]+$" maxlenght="20" value="<?= @htmlentities($user['firstname']) ?>">
    </div>
    <div class="input mb-3">
        <label class="name" for="mail">E-mail : </label>
        <input class="form-control" type="email" name="mail" id="mail" pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" value="<?= @htmlentities($user['mail']) ?>" required>
    </div>
    <div class="password mb-3">
        <span>Mot de passe : </span>
        <?php
        if (!empty($user['password'])) {
            echo '<span class="success p-2">ACTIF</span>';
        } else {
            echo '<span class="warning p-2">INACTIF</span>';
        }
        ?>
    </div>
    <div class="id_admin">
        <label for="id_admin">Administrateur </label>
        <input type="checkbox" name="is_admin" id="is_admin" <?= @($user['is_admin'] === 1) ? 'checked' : '' ?>>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-lg btn-add" value="<?= @($_GET['id'] == 'new') ? 'Ajouter' : 'Modifier' ?>">
        <a class="btn btn-lg btn-cancel" href="index.php?controller=users&action=list">Annuler</a>
    </div>
    </form>
    <?php if ($_GET['id'] != 'new') : ?>
        <div class="text-center mb-3"><a class="button" href="index.php?controller=users&action=password&id=<?= $user['id_user']; ?>">Changer le mot de passe</a></div>
    <?php endif; ?>

        <script src="../../public/js/users.js"></script>

        <?php $content = ob_get_clean();
        require ROOT . '/view/template/default.php';
