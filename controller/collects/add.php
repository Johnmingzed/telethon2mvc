<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}


if (isset($_POST['collect'], $_POST['stand'], $_POST['partner'])) {
    if (!empty($_POST['collect'])) {
        $stand_id = empty($_POST['stand']) ? NULL : $_POST['stand'];
        $partner_id = empty($_POST['partner']) ? NULL : $_POST['partner'];

        if (collects_add($pdo, $_POST['collect'], $stand_id, $partner_id)) {


            $_SESSION['msg'] = [
                'css' => 'is-succes',
                'txt' => 'Votre collecte a été ajoutée'
            ];
        } else {
            $_SESSION['msg'] = [
                'css' => 'is-warning',
                'txt' => 'CornePute'
            ];
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'is-warning',
            'txt' => 'Merci completer les champs requis'
        ];
    }
}
//$collects = collects_fetchAll($pdo) ;

header('Location: index.php');
//require ROOT . '/view/collects/list.view.php';
