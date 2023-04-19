<?php

$partners = partners_fetchAll($pdo);

require_once ROOT . '/view/partners/list.view.php';