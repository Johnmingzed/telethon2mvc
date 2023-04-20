<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}



$collects = collects_FetchbyId($pdo, $_GET['id']);
$partners = fetch_partner_by_id($pdo, $_GET['id']);
$stands = read_stands_by_id($pdo, $_GET['id']);

if (isset($_POST['collect'], $_POST['partner_id'], $_POST['stand_id'])) {
    if(!empty($_POST['collect'])){
        $collect= empty($_POST['partner_id']) ? NULL : $_POST['partner_id'];
        $collect= empty($_POST['stand_id']) ? NULL : $_POST['stand_id'];
        if(collects_update($pdo, $_POST['collect'], $_POST['partner_id'], $ $_POST['stand_id'], $_GET['id'] )){
            $_SESSION['$msg'] = [
                'css'=>'is-succes',
                'txt'=>'Votre collecte a été mis a jour'
            ];
        }else {
            $_SESSION['$msg'] = [
                'css'=>'is-warning',
                'txt'=>'Cornepute'
            ];  
        }
    }
}

var_dump($collects);

require ROOT.'/view/collects/update.view.php';