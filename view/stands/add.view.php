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
            <input class="form-control" type="text" id="name" name="name"  value="" required>
        </div>
        <div class="input mb-3">
            <label for="place">Localisation</label>
            <input class="form-control" type="text" id="place" name="place" value="" required>
        </div>
        <div class="input mb-3">
            <label for="mail">Contact</label>
            <input class="form-control" type="email" id="mail" name="mail" value="" required> 
        </div>
        <div class="input mb-3">
            <label for="phone">Téléphone</label>
            <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" required> 
            <small>Format: 99.99.99.99.99</small>
        <div>
        <div class="input mb-3">
            <label for="picture">Logo</label>
            <input type="file" id="picture" name="picture"> 
        <div class="input mb-3">
            <label for="note">Commentaire</label>
            <textarea class="form-control" name="notes" id="notes" cols="30" rows="10"></textarea> 
        </div>
        <div class="text-center">
            <input class="btn btn-lg btn-add" type="submit" value="Ajouter">
            <input class="btn btn-lg btn-cancel" type="reset" value="Annuler">
        </div>
    </fieldset>
</form>
<?php
    $content = ob_get_clean();
    require ROOT.'/view/template/default.php';
?>