<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    
    $title = "Mise à jour du stand";
    ob_start();
?>
<form action="index.php?controller=stands&action=update"  method="post">
    <fieldset>
        <div class="input mb-3">
            <?php foreach($listStands as $listStand) : ?>
                <input type="hidden" id="id" name="id" value="<?= $listStand['id_stand'] ?>">
            <?php endforeach ; ?>
        </div>
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
        <div id="space-contact-stand">
            <div class="input mb-3 fields-contact" id="e-mail">
                <?php foreach($listStands as $listStand) : ?>
                    <label for="mail">Contact</label>
                    <input class="form-control" type="email" id="mail" name="mail" value="<?= $listStand['mail'] ?>"> 
                <?php endforeach ; ?>
            </div>
            <div class="input mb-3 fields-contact" id="telephone">
                <?php foreach($listStands as $listStand) : ?>
                    <label for="phone">Téléphone</label>
                    <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" value="<?= $listStand['phone'] ?>"> 
                    <small>Format: 99.99.99.99.99</small>
                <?php endforeach ; ?>
            </div>
        </div>
        <div id="space-picture-stand">
            <div class="input mb-3 fields-picture">
                <?php foreach($listStands as $listStand) : ?>
                    <label for="picture">Logo</label>
                    <input type="file" id="picture" name="picture" value="<?= $listStand['picture'] ?>"> 
                    <?php endforeach ; ?>
                </div>
            <?php foreach($listStands as $listStand) : ?>
                <div class="mb-3 fields-picture" style="width:160px">
                    <img class="stand_picture" id="standsPic" src="../../public/images/<?= $listStand['picture']; ?>" alt="" style="max-width:100%">
                </div>
            <?php endforeach ; ?>
        </div>
        <div class="input mb-3">
        <?php foreach($listStands as $listStand) : ?>
            <label for="note">Commentaire</label>
            <textarea class="form-control" name="notes" id="notes" cols="30"><?= $listStand['notes'] ?></textarea> 
            <?php endforeach ; ?>
        </div>
        <div class="text-center">
            <input class="btn btn-lg btn-add" type="submit" value="Mettre à jour le stand">
            <a href="https://telethon2.lesacteursduweb.fr/public/index.php?controller=stands"><input class="btn btn-lg btn-cancel" type="reset" value="Annuler"></a>
        </div>
    </fieldset>
</form>
            <script src="../../public/js/stands.js"></script>
            <?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>