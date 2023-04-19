<?php
    $title = 'Stands';
    ob_start();
?>
<main>
    <?php
        $image = 'ferrari.jpg';
        $nameFichier = explode('.', $image);
        var_dump($nameFichier);
        $nomfichier = basename(ROOT.'/public/images/user_1.png', '.png');
        var_dump($nomfichier);
        
    ?>
        <h1><?= $nameFichier[0]; ?></h1>
        <h1><?= $nomfichier; ?></h1>
    <a href="index.php?controller=stands&action=add">Ajouter</a>
    <table>
        <tr>
            <th>Nom du stand</th>
            <th>Localisation</th>
            <th>Action</th>
        </tr>
        <?php foreach($listStands as $listStand) : ?>
            <tr>
                <td><?= $listStand['name'] ?></td>
                <td><?= $listStand['place'] ?></td>
                <td>
                    <a href="index.php?controller=stands&action=update"><i class="bi bi-pencil fs-3"></i></a>
                    <a href="index.php?controller=stands&action=delete"><i class="bi bi-trash fs-3"></i></a>
                </td>
            </tr>
        <?php endforeach ; ?>
    </table>
</main>
<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>