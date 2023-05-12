<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Partenaires';
ob_start();

if ($_GET['id'] == 'new') : ?>
    <form action="index.php?controller=partners&action=edit" method="post" enctype="multipart/form-data">
    <?php else : ?>
        <form action="index.php?controller=partners&action=update?>" method="post" enctype="multipart/form-data">
        <?php endif; ?>
            <label class="name" for="lastname">Nom : </label>
            <input class="form-control" type="text" name="lastname" id="lastname" value="<?= @htmlentities($partner['lastname']) ?>">
            <small>un message contextuel</small>
        </div>
        <div class="input mb-3">
            <label class="name" for="firstname">Prénom : </label>
            <input class="form-control" type="text" name="firstname" id="firstname" value="<?= @htmlentities($partner['firstname']) ?>">
        </div>
        <div class="input mb-3">
            <label class="name" for="mail">E-mail : </label>
            <input class="form-control" type="email" name="mail" id="mail" value="<?= @htmlentities($partner['mail']) ?>" required>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-lg btn-add" value="<?= @($_GET['id'] == 'new') ? 'Ajouter' : 'Modifier' ?>">
            <a class="btn btn-lg btn-cancel" href="index.php?controller=partners&action=list">Annuler</a>
        </div>
        </form>

        <?php $content = ob_get_clean();
        require ROOT . '/view/template/default.php';
