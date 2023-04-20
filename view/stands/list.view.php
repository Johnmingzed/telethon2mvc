<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    $title = 'Stands';
    ob_start();
?>
<main>
    <?php
        $_FILES['image']['name'] = 'ferrari.jpg';

        var_dump($_FILES['image']['tmp_name'].PHP_EOL);
        echo "</br>";
        echo "</br>";
        $image = 'ferrari.jpg';
        $nameFichier = explode('.', $_FILES['image']['name']);
        var_dump($nameFichier);
        $image = 'user_10.jpg';
        $nomfichier = !file_exists(ROOT.'/public/images/'.$image);
        var_dump($nomfichier);
        $time = time();
        $nouveau_nom_de_photo = $nameFichier[0].$time.'.'.$nameFichier[1];
        var_dump($nouveau_nom_de_photo);
        
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
                    <a href="index.php?controller=stands&action=update&id=<?= $listStand['id_stand'] ?>"><i class="bi bi-pencil fs-3"></i></a>
                    <a href="index.php?controller=stands&action=delete&id=<?= $listStand['id_stand'] ?>"><i class="bi bi-trash fs-3"></i></a>
                </td>
            </tr>
        <?php endforeach ; ?>
    </table>
</main>
<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>