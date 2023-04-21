<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

if (isset($_GET['id'])) {
    if($_GET['id'] == 'new'){
    } elseif (is_numeric($_GET['id'])){
        $user = fetch_partner_by_id($pdo, $_GET['id']);
    }
} else {
    $msg = [
        'css' => 'warning',
        'txt' => 'Erreur: impossible de modifier le partenaire!'
    ];
    $_SESSION['msg'] = $msg;
    header('Location: index.php?controller=partners&action=list');
}

require_once ROOT . '/view/partners/edit.view.php';
