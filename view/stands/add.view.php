<?php
    $title = 'Ajouter un stands';
    ob_start();
?>
<main>
    <form action="">
        <fieldset>
            <legend>Formulaire d'ajout d'un stand</legend>
            <div>
                <label for="name">Nom du stands</label>
                <input type="text" id="name" name="name" value="" require>
            </div>
            <div>
                <label for="place">Localisation</label>
                <input type="text" id="place" name="place" value="" rquire>
            </div>
            <div>
                <label for="mail">Contact</label>
                <input type="text" id="mail" name="mail" value="" require> 
            </div>
            <div>
                <label for="phone">Téléphone</label>
                <input type="text" id="phone" name="phone" value="" require> 
            <div>
            <div>
                <label for="picture">Logo</label>
                <input type="text" id="picture" name="picture" value=""> 
            <div>
                <label for="note">Commentaire</label>
                <textarea name="note" id="note" cols="30" rows="10"></textarea> 
            </div>
            <div>
                <input type="submit" value="Ajouté">
                <input type="reset" value="Annuler">
            </div>
        </fieldset>
    </form>
</main>
<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>