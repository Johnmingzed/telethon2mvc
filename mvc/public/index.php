<?php

session_start();

require '../inc/conf.php';

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'donation':
        case 'user':
        case 'partner':
        case 'stand':
            $controller = $_GET['controller'];
            break;
        
        default:
            $controller = '404';
            break;
    }
}else {
    $controller = 'donation';
}

/*if(!isset($_SESSION['profil'])){
/   $controller = 'profil';
}
*/ 

 require_once ROOT.'/controller/'.$controller.'/index.php';