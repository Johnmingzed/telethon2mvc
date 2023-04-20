<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    $title = "Suppression d'un stand";
    ob_start();
?>
    <?php   foreach($listStands as $listStand): ?>
        <h1>Voulez-vous vraiment supprimer le stand : <?= $listStand['name'] ?></h1>
    <?php   endforeach; ?>
    <button type="text"><a href="index.php?controller=stands&action=delete&id=<?= $listStand['id_stand'] ?>&confirmation=yes">Oui</a></button>
    <button type="text"><a href="index.php?controller=stands&action=delete&confirmation=no">Non</a></button>
<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>