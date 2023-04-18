<?php

    require_once 'pdo.php';

    function readCollect(PDO $pdo){
        $sql = 'SELECT * FROM `stands` ';
        $q = $pdo -> query($sql);
        return $q -> fetchAll(PDO::FETCH_ASSOC);
    }
?>