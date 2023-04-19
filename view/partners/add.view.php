<?php
$title = 'Les parternaires';
ob_start();
?>

<main>
    <form action="index.php?controller=partners&action=add" method="post">
        <legend>Formulaire d'ajout d'un partenaire</legend>
        <div class="mb-3">
            <label for="name" class="name">Nom du partenaire</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="firstname" class="firstname">Nom</label>
            <input type="text" class="form-control" id="firstname" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="lastname">Prénom</label>
            <input type="text" class="form-control" id="lastname" required>
        </div>
        <div class="mb-3">
            <label for="mail" class="mail">Email</label>
            <input type="email" class="form-control" id="mail" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="phone">Téléphone</label>
            <input type="text" class="form-control" id="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" required>
        </div>
        <a type="submit" class="btn">Ajouter</a>
        <a type="submit" class="btn">Annuler</a>
    </form>
    </fieldset>
    </form>
</main>

<?php $content = ob_get_clean();
require ROOT . '/view/template/default.php';
