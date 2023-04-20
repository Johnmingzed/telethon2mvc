<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    $title = 'Ajouter un stands';
    ob_start();
?>

<main>
    <form action="index.php?controller=stands&action=add" method="post">
        <fieldset>
            <legend>Formulaire d'ajout d'un stand</legend>
            <div>
                <label for="name">Nom du stands</label>
                <input type="text" id="name" name="name" value="" required>
            </div>
            <div>
                <label for="place">Localisation</label>
                <input type="text" id="place" name="place" value="" required>
            </div>
            <div>
                <label for="mail">Contact</label>
                <input type="email" id="mail" name="mail" value="" required> 
            </div>
            <div>
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" required> 
                <small>Format: 99.99.99.99.99</small>
            <div>
            <div>
                <label for="picture">Logo</label>
                <input type="file" id="picture" name="picture" value=""> 
            <div>
                <label for="note">Commentaire</label>
                <textarea name="notes" id="notes" cols="30" rows="10"></textarea> 
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