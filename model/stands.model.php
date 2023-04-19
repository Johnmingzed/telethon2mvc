<?php

    require_once 'pdo.php';

    function read_stands(PDO $pdo){
        $sql = 'SELECT * FROM `stands` ';
        $q = $pdo -> query($sql);
        $q -> execute();
        return $q -> fetchAll(PDO::FETCH_ASSOC);
    }

    function read_stands_by_name_stands(PDO $pdo, string $name){
        $sql = 'SELECT * FROM stands WHERE stands.name = ?';
        $q = $pdo -> prepare($sql);
        $q -> execute([$name]);
        return $q -> fetchAll(PDO::FETCH_ASSOC);
    }

    function read_stands_by_email(PDO $pdo, string $mail){
        $sql = 'SELECT * FROM `stands` WHERE stands.mail = ?';
        $q = $pdo -> prepare($sql);
        $q -> execute([$mail]);
        return $q -> fetchAll(PDO::FETCH_ASSOC);
    }

    function add_stands(PDO $pdo, string $name, string $place, string $notes, string $mail, string $phone, string $logo){
        $sql = 'INSERT INTO `stands` SET (stands.name, stands.mail, stands.phone, stands.place, stands.picture, stands.notes) VALUES (:name, :mail, :phone, :place, :picture, :notes)';
        $q = $pdo->prepare($sql);
            $q->bindValue(':name', $name);
            $q->bindValue(':mail', $mail);
            $q->bindValue(':phone', $phone);
            $q->bindValue(':place', $place);
            $q->bindValue(':picture', $logo);
            $q->bindValue(':name', $name);
            $q->bindValue(':notes', $notes);
        return $q->execute();
    }
?>