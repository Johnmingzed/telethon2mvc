<?php

if (!defined('FROM_INDEXES')) {
  die('Acces Refusé');
}


if (isset($_GET['id'])) {
  collects_delete($pdo, $_GET['id']);
  $msg = [
    'css' => 'success',
    'txt' => 'La collecte a bien été supprimée'
  ];
  header('Location: index.php?controller=collects');
  exit;
} else {
  $msg = [
    'css' => 'warning',
    'txt' => 'Action impossible'
  ];
  header('Location: index.php?controller=collects');
  exit;
}
$_SESSION['msg'] = $msg;
header('Location: index.php');
