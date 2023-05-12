<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    $title = 'Ajouter un stands';
    ob_start();
?>
<form action="index.php?controller=stands&action=add" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Formulaire d'ajout d'un stand</legend>
        <div class="input mb-3">
            <label  for="name">Nom du stands</label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>
        <div class="input mb-3">
            <label for="place">Localisation</label>
            <input class="form-control" type="text" id="place" name="place" required>
        </div>
        <div id="space-contact-stand">
            <div class="input mb-3 fields-contact" id="e-mail">
                <label for="mail">Contact</label>
                <input class="form-control" type="email" id="mail" name="mail" required> 
            </div>
            <div class="input mb-3 fields-contact" id="telephone">
                <label for="phone">Téléphone</label>
                <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" required> 
                <small>Format: 99.99.99.99.99</small>
            </div>
        </div>
        <div id="space-picture-stand">
            <div class="input mb-3 fields-picture">
                <label for="picture">Logo</label>
                <input type="file" id="picture" name="picture"> 
            </div>
            <div class="mb-3 fields-picture" style="width:160px">
                <img class="stand_picture" id="standsPic" src="../../public/images/user_image_1.png" alt="" style="max-width:100%">
            </div>
        </div>
        <div class="input mb-3">
            <label for="note">Commentaire</label>
            <textarea class="form-control" name="notes" id="notes" cols="30"></textarea> 
        </div>
        <div class="text-center">
            <input class="btn btn-lg btn-add" type="submit" value="Ajouter">
            <input class="btn btn-lg btn-cancel" type="reset" value="Annuler">
        </div>
    </fieldset>
</form>
<script src="../../public/js/stands.js"></script>
<?php
    $content = ob_get_clean();
    require ROOT.'/view/template/default.php';
?>