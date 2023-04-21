<?php
if (!defined('FROM_INDEXES')) {
    die('Prout');
}
require_once ROOT . '/model/stands.model.php';

if (isset($_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'], $_POST['picture'], $_POST['notes'], $_POST['id'])) {
    if (!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['id'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            if (read_stands_by_name_stands($pdo, $_POST['name']) == false) {
                if (read_stands_by_email($pdo, $_POST['mail']) == false) {
                    $phone = empty($_POST['phone']) ? NULL : $_POST['phone'];
                    $place = empty($_POST['place']) ? NULL : $_POST['place'];
                    $logo = empty($_POST['picture']) ? NULL : $_POST['picture'];
                    $notes = empty($_POST['notes']) ? NULL : $_POST['notes'];
                    if (update_stands($pdo, $_POST['name'], $_POST['mail'], $phone, $place, $logo, $notes, $_POST['id'])) {
                        $_SESSION['msg'] = [
                            'css' => 'success',
                            'txt' => 'Félicitation, votre stand a bien été mis à jour !'
                        ];
                        header('Location: index.php?controller=stands');
                        exit;
                    }
                } else {
                    $_SESSION['msg'] = [
                        'css' => 'warning',
                        'txt' => 'Cet email existe déjà !'
                    ];
                    header('Location: index.php?controller=stands');
                    exit;
                }
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Ce nom de stand existe déjà !'
                ];
                header('Location: index.php?controller=stands');
                exit;
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Votre adresse mail n\'est pas bonne !'
            ];
            header('Location:, index.php?controller=stands');
            exit;
        }
    }
} elseif (isset($_GET['id'])) {
    $listStands = read_stands_by_id($pdo, $_GET['id']);
}

require_once ROOT . '/view/stands/update.view.php';
