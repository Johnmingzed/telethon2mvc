<?php 
    $title = 'Modifier les collectes';
    ob_start(); 
?>
<main>
    <form action="index.php?controller=collects&action=update" method="post">
    <div class="fields">
        <div class="field">
            <label for="collect">Collecte</label>
            <?php foreach($collects as $collect) : ?>
            <input type="text" name="collect" id="collect" value="<?=$collect['collect']?>">
            <?php endforeach ; ?>
        </div>
        <div class="field">
        <?php foreach($stands as $stand) : ?>
            <select name="stand" id="stand">
                <option value="<?= $stand['stand'] ?>"></option>
            </select>
            
            <?php endforeach ; ?>
        </div>
        <div class="field">
        <?php foreach($partners as $partner) : ?>
            <select name="partner" id="partner">
                <option value="<?= $partner['partner'] ?>"></option>
            </select>
            
            <?php endforeach ; ?>
        </div>
        <div class="submit">
            <input type="submit" value="Enregistrer les modification">
        </div>
        
    </div>
</form>
</main>
<?php
$content = ob_get_clean();
require ROOT.'/view/template/default.php'; 

?>