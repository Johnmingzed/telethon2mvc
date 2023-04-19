<?php 

require_once ROOT . '/model/partners.model.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'list':
        case 'delete':
        case 'update':
        case 'add':
            $action = $_GET['action'];
            break;
        default:
            require_once ROOT . '/controller/404/index.php';
            exit;
    }
} else {
    $action = 'list';
}

require_once __DIR__ . '/' . $action . '.php';