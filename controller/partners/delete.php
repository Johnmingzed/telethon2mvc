<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

if (isset($_GET['id'])) {
    partners_delete($pdo, $_GET['id']);
    $msg = [
        'css'=>'success',
        'txt'=>'Le partenaire a été supprimé avec succès!'
     ];
   }else{
     $msg = [
        'css'=>'warning',
        'txt'=>'Erreur: impossible de supprimer le partenaire!'
     ];
   }
   $_SESSION['msg'] = $msg;
   header('Location: index.php/controller?=partners');