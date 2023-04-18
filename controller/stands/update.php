<?php
    require_once ROOT.'/model/stands.model.php';

    $listStands = readCollect($pdo);

    require_once ROOT.'/view/stands/update.view.php';