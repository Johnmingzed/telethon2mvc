<?php

/**
 * controller action list
 */


$collects = collects_fetchAll($pdo);
$stands = read_stands($pdo);
// Appeler la vue

require ROOT.'/view/collects/list.view.php';