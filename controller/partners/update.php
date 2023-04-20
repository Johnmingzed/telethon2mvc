<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

$partners = fetch_partner_by_id($pdo, $_GET['id']);

if (isset($_POST['partner'], $_POST['partner_id'], $_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['phone'], $_POST['name'])) {
    if(!empty($_POST['partner'])){
        $partner= empty($_POST['partner_id']) ? NULL : $_POST['partner_id'];
        if(update_partner($pdo, $_POST['partner'], $_POST['partner_id'],$_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['phone'], $_POST['name'], $_GET['id'] )){
            $_SESSION['msg'] = [
                'css'=>'success',
                'txt'=>'Votre profil a été mis à jour'
            ];
        }else {
            $_SESSION['msg'] = [
                'css'=>'warning',
                'txt'=>'Unsucceeded'
            ];  
        }
    }
}