<?php
    $title = 'confirmation d\'ajout d\'un stand';
    ob_start()
?>
    <h1><?= $connexion ?></h1>
<?php
    $content = ob_get_clean();
    require_once ROOT.'/view/template/default.php';
?>