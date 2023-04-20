<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    
    $title = "Mise à jour du stand";
    ob_start();
?>

<main>
    <form action="index.php?controller=stands&action=update"  method="post">
        <fieldset>
            <legend>Mise à jour du stand</legend>
    
            <div>
                <?php foreach($listStands as $listStand) : ?>
                    <label for="name">Nom du stands</label>
                    <input type="text" id="name" name="name" value="<?= $listStand['name'] ?>">
                <?php endforeach ; ?>
            </div>
            <div>
                <?php foreach($listStands as $listStand) : ?>
                    <label for="place">Localisation</label>
                    <input type="text" id="place" name="place" value="<?= $listStand['place'] ?>">
                <?php endforeach ; ?>
            </div>
            <div>
                <?php foreach($listStands as $listStand) : ?>
                    <label for="mail">Contact</label>
                    <input type="email" id="mail" name="mail" value="<?= $listStand['mail'] ?>"> 
                <?php endforeach ; ?>
            </div>
            <div>
                <?php foreach($listStands as $listStand) : ?>
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}.[0-9]{2}" value="<?= $listStand['phone'] ?>"> 
                    <small>Format: 99.99.99.99.99</small>
                <?php endforeach ; ?>
            <div>
            <div>
                <?php foreach($listStands as $listStand) : ?>
                    <label for="picture">Logo</label>
                    <input type="file" id="picture" name="picture" value="<?= $listStand['picture'] ?>"> 
                <?php endforeach ; ?>
            <div>
                <?php foreach($listStands as $listStand) : ?>
                    <label for="note">Commentaire</label>
                    <textarea name="notes" id="notes" cols="30" rows="10"><?= $listStand['notes'] ?></textarea> 
                <?php endforeach ; ?>
            </div>
            <div style="display: none;">
                <?php foreach($listStands as $listStand) : ?>
                    <input type="text" id="id" name="id" value="<?= $listStand['id_stand'] ?>">
                <?php endforeach ; ?>
            </div>
            <div>
                <input type="submit" value="Mettre à jour le stand">
                <input type="reset" value="Annuler">
            </div>
        </fieldset>
    </form>
</main>

<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>