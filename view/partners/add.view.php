<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$title = 'Les parternaires';
ob_start();
?>

<form method="post" action="index.php?controller=partners&action=add">
    <?php if (isset($_SESSION['msg'])) : ?>
        <div class="<?= $_SESSION['msg']['css'] ?>">
            <?= $_SESSION['msg']['txt'] ?>
        </div>
        <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>
    <legend>Formulaire d'ajout d'un partenaire</legend>
    <div class="mb-3">
        <label for="name" class="name">Nom du partenaire</label>
        <input type="text" class="form-control" name="name" id="name" value="" placeholder="John Doe's Company" required>
    </div>
    <div class="mb-3">
        <label for="firstname" class="firstname">Nom</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="" placeholder="Doe" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="lastname">Prénom</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="" placeholder="John" required>
    </div>
    <div class="mb-3">
        <label for="mail" class="mail">Email</label>
        <input type="email" class="form-control" id="mail" name="mail" value="" placeholder="johndoe@somewhere.com" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="phone">Téléphone</label>
        <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" placeholder="09.09.09.09.09" value="" required>
    </div>
    <input type="submit" value="Ajouter" class="btn btn-lg btn-add">
    <input type="reset" value="Annuler" class="btn btn-lg btn-cancel" href="index.php?controller=partners&action=list">
</form>


<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
