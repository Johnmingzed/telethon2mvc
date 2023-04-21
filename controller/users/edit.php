<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

/**
 * Sélectionne un utilisateur par son ID ou propose de créer un nouvel utilisateur
 */

if (isset($_GET['id'])) {
    if ($_GET['id'] == 'new') {
    } elseif (is_numeric($_GET['id'])) {
        $user = fetch_user_by_id($pdo, $_GET['id']);
    }
} else {
    $msg = [
        'css' => 'warning',
        'txt' => 'Veuillez sélectionner un utilisateur'
    ];
    $_SESSION['msg'] = $msg;
    header('Location: index.php?controller=users&action=list');
}

require_once ROOT . '/view/users/edit.view.php';
