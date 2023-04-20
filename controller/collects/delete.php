<?php

if (!defined('FROM_INDEXES')) {
  die('Acces Refusé');
}


if (isset($_GET['id'])) {
    collects_delete($pdo, $_GET['id']);
    $msg = [
        'css'=>'is-success',
        'txt'=>'La collecte a bien été supprimée'
     ];
   }else{
     $msg = [
        'css'=>'is-warning',
        'txt'=>'Action impossible'
     ];
   }
   $_SESSION['msg'] = $msg;
   header('Location: index.php');