<?php
    /*********Probleme de la liste partenaire a regler(quand fonction lié partenaire fait)
     *********Regler le probleme "ajouter un stand bug la collecte"
     */
    $title = 'Liste des collectes';
    ob_start();
    require_once ROOT . '/inc/debug.php';
    //debug($collects);
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
                        
                        <?php foreach($stands as $stand) :?>
                            <option value="<?= $stand['id_stand'] ?>"><?= $stand['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="field">
                    <label for="partner">Partenaire</label>
                    <select name="partner" id="partner">
                        <option value="">Pas de partenaire</option>
                        <?php foreach($partners as $partner) :?>
                            <option value="<?= $partner['id_partner'] ?>"><?= $partner['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                
            </div>

            <div class="submit">
                <input type="submit" value="Enregistrer">
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
            <?php foreach($collects as $collect): ?>
            <tr>
                <td><?= $collect['collect'] ?></td>
                <td><?= $collect['date'] ?></td>
                <td><?= $collect['partner_name']?></td>
                <td><?= $collect['name']?></td>
                <td><a href="">Modifier</a> - <a href="index.php?controller=collects&action=delete&id=<?= $collect['id_collect']; ?>">Supprimer</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php
//require_once ROOT . '/inc/debug.php';
debug($collect);
$content = ob_get_clean();
require ROOT.'/view/template/default.php';
?>