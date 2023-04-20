<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

if (isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['phone'], $_POST['name'])) {
    $partner_id = empty($_POST['partner']) ? NULL : trim(htmlspecialchars($_POST['partner']));
    if (add_partner($pdo, $_POST['partner'], $partner_id, $mail, $phone, $name)) {
        $_SESSION['msg'] = [
            'css' => 'is-success',
            'txt' => 'Votre compte a été ajouté'
        ];
    } else {
        $_SESSION['msg'] = [
            'css' => 'is-warning',
            'txt' => 'Unsucceeded'
        ];
    }
} else {
    $_SESSION['msg'] = [
        'css' => 'is-warning',
        'txt' => 'Merci completer les champs requis'
    ];
}

require ROOT . '/view/partners/add.view.php';