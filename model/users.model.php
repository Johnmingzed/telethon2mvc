<?php

/**
 * Composants d'accès aux données de la table utilisateurs
 */

require_once __DIR__ . '/pdo.php';



/**
 * Retourne le mot de passe d'un utilisateur par son mail
 * @param PDO $pdo
 * @param string $email
 * @return $string
 */
function get_password(PDO $pdo, string $email){
    $sql = 'SELECT password FROM users WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$email]);
    return $q->fetchColumn();
}



/**
 * Retourne un utilisateur par son mail
 * @param PDO $pdo
 * @param string $email
 * @return array
 */
function fetch_user_by_mail(PDO $pdo, string $email){
    $sql = 'SELECT * FROM users WHERE mail = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$email]);
    return $q->fetch(PDO::FETCH_ASSOC);
}



/**
 * Retourne un utilisateur par son ID
 * @param PDO $pdo
 * @param int $id
 * @return array
 */
function fetch_user_by_id(PDO $pdo, int $id){
    $sql = 'SELECT * FROM users WHERE id_user = ?';
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    return $q->fetch(PDO::FETCH_ASSOC);
}




/**
 * Retourne l'ensemble des utilisateurs
 *
 * @param PDO $pdo
 * @return array
 */
function users_fetchAll(PDO $pdo)
{
    $sql = 'SELECT * FROM users';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}




/**
 * Ajouter un nouvel utilisateur
 * 
 * @param PDO $pdo
 * @param string $mail
 * @param string $firstname
 * @param string $lastname
 * @param bool $is_admin
 * @return bool
 */
function add_user(PDO $pdo, string $mail, string $firstname = null, string $lastname = null, bool $is_admin = null)
{
    $sql = 'INSERT INTO users (mail, firstname, lastname, is_admin) VALUES (:mail, :firstname, :lastname, :is_admin)';
    $q = $pdo->prepare($sql);
    $q->bindValue(':mail', $mail);
    $q->bindValue(':firstname', $firstname);
    $q->bindValue(':lastname', $lastname);
    $q->bindValue(':is_admin', $is_admin);
    return $q->execute();
}




/**
 * Supprime un utilisateur par son ID
 * 
 * @param PDO $pdo
 * @param int $id
 * @return bool
 */
function delete_user(PDO $pdo, int $id)
{
    $sql = 'DELETE FROM users WHERE id_user = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id]);
}





/**
 * Mettre à jour un utilisateur sélectionnée par son ID
 * 
 * @param PDO $pdo
 * @param array $data : tableau contenant les données de l'utilisateur dont son id
 * @return bool
 */
function update_user(PDO $pdo, array $data)
{
    $sql = 'UPDATE users SET ';
    foreach ($data as $key => $value) {
        $sql .= $key . ' = :' . $key . ', ';
    }
    $sql = str_replace('id_user = :id_user, ', '', $sql);
    $sql = substr($sql, 0, -2);
    $sql .= ' WHERE id_user = :id_user';
    $q = $pdo->prepare($sql);
    return $q->execute($data);
}