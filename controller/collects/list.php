<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}


/**
 * controller action list
 */


$collects = collects_fetchAll($pdo);
$stands = read_stands($pdo);
$partners = partners_fetchAll($pdo);
// Appeler la vue

require ROOT . '/view/collects/list.view.php';
