<?php
    require_once ROOT.'/model/stands.model.php';

    /**
     * Routage par action
     */

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'list' :
            case 'add' :
            case 'delete' :
            case 'update' :
                $action = $_GET['action'];
                break;
            default :
                require_once ROOT.'/controller/404/index.php';
        }
    }else{
        $action = 'list';
    }

    require_once __DIR__.'/'.$action.'.php';