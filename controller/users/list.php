<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

/**
 * Controller action list
 */

// On va chercher les données du model
$users = users_fetchAll($pdo);

// On appelle la vue
require_once ROOT . '/view/users/list.view.php';
