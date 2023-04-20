<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }

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
    
    function read_stands_by_id(PDO $pdo, int $id){
        $sql = 'SELECT * FROM `stands` WHERE stands.id_stand = ?';
        $q = $pdo->prepare($sql);
        $q->execute([$id]);
        $q->fetchAll(PDO::FETCH_ASSOC);
    }

    function add_stands(PDO $pdo, string $name, string $mail, string $phone, string $place, $logo, $notes){
        $sql = 'INSERT INTO `stands`(stands.name, stands.mail, stands.phone, stands.place, stands.picture, stands.notes) VALUES (:name, :mail, :phone, :place, :picture, :notes)';
        $q = $pdo->prepare($sql);
            $q->bindValue(':name', $name);
            $q->bindValue(':mail', $mail);
            $q->bindValue(':phone', $phone);
            $q->bindValue(':place', $place);
            $q->bindValue(':picture', $logo);
            $q->bindValue(':notes', $notes);
        return $q->execute();
    }

     function update_stands(PDO $pdo, string $name, string $mail, string $phone, string $place, $logo, $notes, int $id){
        $sql = 'UPDATE stands SET stands.name = :name, stands.mail = :mail, stands.phone = :phone, stands.place = :place, stands.picture = :picture, stands.notes = :notes WHERE stands.id_stand ='.$id;
        $q = $pdo->prepare($sql);
            $q->bindValue(':name', $name);
            $q->bindValue(':mail', $mail);
            $q->bindValue(':phone', $phone);
            $q->bindValue(':place', $place);
            $q->bindValue(':picture', $logo);
            $q->bindValue(':notes', $notes);
        return $q->execute();
    }

    function delete(PDO $pdo, int $id){
        $sql = 'DELETE FROM stands WHERE stands.id_stand ='.$id;
        $q = $pdo->prepare($sql);
        return $q->execute();
    }
?>