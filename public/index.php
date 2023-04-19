<?php

// Affichage des erreurs et activation
error_reporting(E_ALL);

session_start();

require __DIR__. '/../inc/conf.php';
// Activation de debug.php
require_once ROOT . '/inc/debug.php';

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'collects':
        case 'users':
        case 'partners':
        case 'stands':
            $controller = $_GET['controller'];
            break;
        
        default:
            $controller = '404';
            break;
    }
}else {
    $controller = 'collects';
}

/*if(!isset($_SESSION['profil'])){
/   $controller = 'profil';
}
*/ 

 require_once ROOT.'/controller/'.$controller.'/index.php';