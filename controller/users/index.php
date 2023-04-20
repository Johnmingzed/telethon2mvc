<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

/**
 * Routage par action sur les utilisateurs
 */

/* if (isset($_SESSION['profil']['is_admin']) && $_SESSION['profil']['is_admin'] === 1) {

} else {
    header('Location: index.php');
} */

require_once ROOT . '/model/users.model.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'list':
        case 'delete':
        case 'edit':
        case 'update':
        case 'add':
        case 'pw_reset':
            $action = $_GET['action'];
            break;
        default:
            require_once ROOT . '/controller/404/index.php';
            exit;
    }
} else {
    $action = 'list';
}

require_once __DIR__ . '/' . $action . '.php';