<?php
    require_once ROOT.'/model/stands.model.php';

    $listStands = read_stands($pdo);

    require_once ROOT.'/view/stands/list.view.php';