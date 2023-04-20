<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

require_once __DIR__ . '/pdo.php';

/**
 * @param PDO $pdo
 * @param string $email
 * @return array
 */

function fetch_partner_by_mail(PDO $pdo, string $email){
    $sql = 'SELECT * FROM partners WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$email]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

function fetch_partner_by_id(PDO $pdo, int $id){
    $sql = 'SELECT * FROM partners WHERE id_partner = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    return $q->fetch(PDO::FETCH_ASSOC);
}

function partners_fetchAll(PDO $pdo)
{
    $sql = 'SELECT * FROM partners';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

function add_partner(PDO $pdo, string $firstname, string $lastname, string $mail, string $phone, string $name)
{
    $sql = 'INSERT INTO partners (firstname, lastname, mail, phone, name) VALUES (:firstname, :lastname, :mail, :phone, :name)';
    $q = $pdo->prepare($sql);
    try {
        $q->execute([
            ':firstname'=> $firstname,
            ':lastname' => $lastname,
            ':mail' => $mail,
            ':phone' => $phone,
            ':name' => $name
        ]);
        $id = $pdo->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        error_log('Error inserting partner: ' . $e->getMessage());
        return false;
    }
}

function update_partner(PDO $pdo, array $data)
{
    $sql = 'UPDATE partners SET ';
    foreach ($data as $key => $value) {
        $sql .= $key . ' = :' . $key . ', ';
    }
    $sql = str_replace('id_partner = :id_partner, ', '', $sql);
    $sql .= ' WHERE id_partner = :id_partner';
    $q = $pdo->prepare($sql);
    $q->execute($data);
    return $data['id_partner'];
}