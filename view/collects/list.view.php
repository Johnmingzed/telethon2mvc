<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

//require_once ROOT . '/inc/debug.php' ;
//debug($_SESSION['msg']);


$title = 'Liste des collectes';
ob_start();
?>
    <section>
        <h3>Ajouter une collecte</h3>
        <form action="index.php?controller=collects&action=add" method="post" class="collect-form">
            <div class="fields">
                <div class="field">
                    <label for="collect">Collecte</label>
                    <input type="number" name="collect" id="collect" min=1 autocomplete="off" required>
                </div>
                <div class="field">
                    <label>Quel est l'origine de la collect ?</label>
                    <div class="type-de-collect">
                        <div class="space-radio stand-radio">
                            <label for="stand">Un stand</label>
                            <input type="radio" name="type-collect" class="radio-collect" id="stand" value="Stand">
                        </div>
                        <div class="space-radio partner-radio">
                            <label for="partner">Un partenaire</label>
                            <input type="radio" name="type-collect" class="radio-collect" id="partner" value="Partenaire">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label for="stand">Voici la liste des stands</label>
                    <select name="stand" id="select-stand">
                        <option value="">Pas de stand</option>

                        <?php foreach ($stands as $stand) : ?>
                            <option value="<?= $stand['id_stand'] ?>"><?= $stand['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="partner">Voici la liste des partenaires</label>
                    <select name="partner" id="select-partner">
                        <option value="">Pas de partenaire</option>
                        <?php foreach ($partners as $partner) : ?>
                            <option value="<?= $partner['id_partner'] ?>"><?= $partner['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="submit">
                <input class="btn btn-lg btn-add" type="submit" value="Enregistrer" >
            </div>
        </form>
    </section>
    
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-start">Date</th>    
                <th class="text-end">Collecte</th>                
                <th>Partenaire</th>
                <th class="text-start">Stand</th>
                <th class="text-end"><!--Actions--></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($collects as $collect) : ?>
                <tr>
                    <td><?= $collect['date'] ?></td>    
                    <td class="text-end"><?= $collect['collect'] ?> Eur</td>
                    
                    <td><?= $collect['partner_name'] ?></td>
                    <td><?= $collect['name'] ?></td>
                    <td class="text-end">
                        <a href="index.php?controller=collects&action=update&id=<?= $collect['id_collect']; ?>"><i class="bi bi-pencil-square fs-4"></i></a> 
                    <a href="index.php?controller=collects&action=delete&id=<?= $collect['id_collect']; ?>"><i class="bi bi-trash fs-4"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <script src="../../public/js/collect.js"></script>
<?php
//require_once ROOT . '/inc/debug.php';
//debug($collect);
$content = ob_get_clean();



require ROOT . '/view/template/default.php';
