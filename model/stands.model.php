<?php

    require_once 'pdo.php';

    function read_stands(PDO $pdo){
        $sql = 'SELECT * FROM `stands` ';
        $q = $pdo -> query($sql);
        return $q -> fetchAll(PDO::FETCH_ASSOC);
    }

    function add_stands(PDO $pdo, string $name, string $place, string $notes){
        $sql = 'INSERT INTO `stands` SET (stands.name, stands.place, stands.notes) VALUES (:name, :place, :notes)';
        $q = $pdo->prepare($sql);
            $q->bindValue(':name', $name);
            $q->bindValue(':place', $place);
            $q->bindValue(':notes', $notes);
        return $q->execute();
    }
?>