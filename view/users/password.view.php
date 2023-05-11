<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Mot de passe';
ob_start();

?>
<form action="index.php?controller=users&action=password&id=<?= $_GET['id'] ?>" method="post">
    <div class="password mb-3">
        <div class="mb-3">État actuel du mot de passe :
            <?php if (!empty($user['password'])) : ?>
                <span class="success p-2 mb-3">ACTIF</span>
        </div>
        <div class="input mb-3">
            <label class="name" for="old_password">Ancien mot de passe : </label>
            <input class="form-control" type="password" name="old_password" id="old_password">
        </div>
            <?php else : ?>
                <span class="warning p-2 mb-3">INACTIF</span>
            </div>
            <?php endif ?>
    </div>
    <div class="input mb-3">
        <label class="name" for="password">Nouveau mot de passe : (8 caractères minimum)</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>
    <div class="input mb-3">
        <label class="name" for="control">Confirmer le mot de passe : </label>
        <input class="form-control" type="password" name="control" id="control">
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-lg btn-add" value="<?= @($_GET['id'] == 'new') ? 'Ajouter' : 'Modifier' ?>">
        <a class="btn btn-lg btn-cancel" href="index.php?controller=users&action=list">Annuler</a>
    </div>
</form>

<script src="../../public/js/users.js"></script>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
