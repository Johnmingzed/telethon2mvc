<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}


if (isset($_POST['collect'], $_POST['stand'], $_POST['partner'])) {
    if (!empty($_POST['collect']) && !empty($_POST['stand']) || !empty($_POST['partner'])) {
        $stand_id = empty($_POST['stand']) ? NULL : $_POST['stand'];
        $partner_id = empty($_POST['partner']) ? NULL : $_POST['partner'];

        if (collects_add($pdo, $_POST['collect'], $stand_id, $partner_id)) {


            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Votre collecte a été ajoutée'
            ];
            header('Location: index.php?controller=collects');
            exit;
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'CornePute'
            ];
            header('Location: index.php?controller=collects');
            exit;
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Merci completer les champs requis'
        ];
        header('Location: index.php?controller=collects');
        exit;
    }
}
//$collects = collects_fetchAll($pdo) ;

header('Location: index.php');
//require ROOT . '/view/collects/list.view.php';
