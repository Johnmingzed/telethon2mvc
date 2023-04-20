<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

//require_once ROOT . '/inc/debug.php' ;
//debug($_SESSION['msg']);


$title = 'Liste des collectes';
ob_start();
?>



<main>

    <section>
        <h3>Ajouter une collecte</h3>
        <form action="index.php?controller=collects&action=add" method="post">
            <div class="fields">
                <div class="field">
                    <label for="collect">Collecte</label>
                    <input type="text" name="collect" id="collect">
                </div>
                <div class="field">
                    <label for="stand">Stand</label>
                    <select name="stand" id="stand">
                        <option value="">Pas de stand</option>

                        <?php foreach ($stands as $stand) : ?>
                            <option value="<?= $stand['id_stand'] ?>"><?= $stand['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="partner">Partenaire</label>
                    <select name="partner" id="partner">
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
    <table>
        <thead>
            <tr>
                <th>Collecte</th>
                <th>Date</th>
                <th>Partenaire</th>
                <th>Sponsor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($collects as $collect) : ?>
                <tr>
                    <td><?= $collect['collect'] ?></td>
                    <td><?= $collect['date'] ?></td>
                    <td><?= $collect['partner_name'] ?></td>
                    <td><?= $collect['name'] ?></td>
                    <td><a href="index.php?controller=collects&action=update&id=<?= $collect['id_collect']; ?>"><i class="bi bi-pencil-square fs-3"></i></a> 
                    <a href="index.php?controller=collects&action=delete&id=<?= $collect['id_collect']; ?>"><i class="bi bi-trash fs-3"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
//require_once ROOT . '/inc/debug.php';
//debug($collect);
$content = ob_get_clean();

require ROOT . '/view/template/default.php';
