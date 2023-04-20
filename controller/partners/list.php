<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$partners = partners_fetchAll($pdo);

require_once ROOT . '/view/partners/list.view.php';