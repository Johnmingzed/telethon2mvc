<?php
require_once ROOT . '/model/collects.model.php';
/**
 * controller action list
 */


$collects = collects_fetchAll($pdo);
//$auteurs = auteurs_fetchAll($pdo);
// Appeler la vue

require ROOT.'/view/collects/list.view.php';