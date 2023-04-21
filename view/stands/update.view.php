<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    
    $title = "Mise à jour du stand";
    ob_start();
?>
<form action="index.php?controller=stands&action=update"  method="post">
    <fieldset>
        <legend>Mise à jour du stand</legend>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <label for="name">Nom du stands</label>
                <input class="form-control" type="text" id="name" name="name" value="<?= $listStand['name'] ?>">
            <?php endforeach ; ?>
        </div>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <label for="place">Localisation</label>
                <input class="form-control" type="text" id="place" name="place" value="<?= $listStand['place'] ?>">
            <?php endforeach ; ?>
        </div>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <label for="mail">Contact</label>
                <input class="form-control" type="email" id="mail" name="mail" value="<?= $listStand['mail'] ?>"> 
            <?php endforeach ; ?>
        </div>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <label for="phone">Téléphone</label>
                <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" value="<?= $listStand['phone'] ?>"> 
                <small>Format: 99.99.99.99.99</small>
            <?php endforeach ; ?>
        <div>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <label for="picture">Logo</label>
                <input type="file" id="picture" name="picture" value="<?= $listStand['picture'] ?>"> 
            <?php endforeach ; ?>
        </div>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <label for="note">Commentaire</label>
                <textarea class="form-control" name="notes" id="notes" cols="30" rows="10"><?= $listStand['notes'] ?></textarea> 
            <?php endforeach ; ?>
        </div>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <input type="text" id="id" name="id" value="<?= $listStand['id_stand'] ?>">
            <?php endforeach ; ?>
        </div>
        <div class="text-center">
            <input class="btn btn-lg btn-add" type="submit" value="Mettre à jour le stand">
            <input class="btn btn-lg btn-cancel" type="reset" value="Annuler">
        </div>
    </fieldset>
</form>

<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>