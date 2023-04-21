<?php
if (!defined('FROM_INDEXES')) {
    die('Prout');
}
require_once ROOT . '/model/stands.model.php';

if ($_GET['id']) {
    $picture = read_stands_colmun_picture_by_id($pdo, $_GET['id']);
    if (isset($picture)) {
        foreach ($picture as $pictures) {
            unlink(ROOT . '/public/images/' . $pictures['picture']);
        }
        delete($pdo, $_GET['id']);

        $_SESSION['msg'] = [
            'css' => 'success',
            'txt' => 'Félicitation, votre stand a bien été supprimé !'
        ];

        header('Location: index.php?controller=stands');
        exit;
    } else {
        delete($pdo, $_GET['id']);

        $_SESSION['msg'] = [
            'css' => 'success',
            'txt' => 'Félicitation, votre stand a bien été supprimé !'
        ];
        header('Location: index.php?controller=stands');
        exit;
    }
}

$listStands = read_stands_by_id($pdo, $_GET['id']);

require_once ROOT . '/view/stands/delete.view.php';
