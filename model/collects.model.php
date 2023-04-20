<?php

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

require_once 'pdo.php';


/**
 * Recupere L'id, la somme, la date(formaté en Jour/Mois/Années) dans la table "collects" et le stand dans la table "stands" grace au stand_id 
 *
 * @param PDO $pdo
 * @return void
 */
function collects_fetchAll(PDO $pdo){
    $sql = 'SELECT collects.id_collect, collects.collect, 
    DATE_FORMAT(collects.date, "%d/%m/%Y") as date, stands.name, partners.name as partner_name 
    FROM collects LEFT JOIN stands ON stands.id_stand = collects.stand_id
    LEFT JOIN partners ON partners.id_partner = collects.partner_id';
    $q = $pdo->query($sql);
    return $q->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Enregistre une nouvelle collecte
 *
 * @param PDO $pdo
 * @param string $collect
 * @param integer|null $partner_id
 * @param integer|null $stand_id
 * @return void
 */
function collects_add(PDO $pdo, float $collect, int $stand_id = null, int $partner_id = null){
    $sql = 'INSERT INTO collects(collects.collect, collects.partner_id, collects.stand_id) VALUES (:collect, :partner_id, :stand_id)';

    $q = $pdo->prepare($sql);
    $q->bindValue(':collect', $collect);
    $q->bindValue(':partner_id', $partner_id);
    $q->bindValue(':stand_id', $stand_id);
    return $q->execute();
}

/**
 * Supprime une collecte
 *
 * @param PDO $pdo
 * @param integer $id
 * @return void
 */
function collects_delete(PDO $pdo, int $id){
    $sql = 'DELETE FROM collects where id_collect = ?';
    $q = $pdo->prepare($sql);
    return $q->execute([$id]);
}

function collects_FetchbyId(PDO $pdo, int $id){
    $sql = 'SELECT * FROM collects WHERE id_collect ='.$id;
    $q = $pdo->prepare($sql);
    $q->execute();
    return $q->fetchAll(PDO::FETCH_ASSOC);
}

function collects_update(PDO $pdo, float $collect , string $partner = null, string $stand, int $id){
    
    $sql = 'UPDATE collects SET collect = :collect, partner = :partner, stand = :stand WHERE id ='.$id;

    $q = $pdo->prepare($sql);
    $q->bindValue(':collect', $collect);
    $q->bindValue(':partner', $partner);
    $q->bindValue(':stand', $stand);
    return $q->execute();
}


/***********SQL POUR LA PROCHAINE FONCTION POUR UPDATE EN R2CUPERANT LES NOM PARTNERS ET STANDS */
/*SELECT collects.collect, stands.id_stand,stands.name as standnname, partners.id_partner, partners.name as partnername
FROM collects
LEFT JOIN stands ON stands.id_stand  =collects.stand_id
LEFT JOIN partners ON partners.id_partner = collects.partner_id
WHERE collects.id_collect = ?*/

/**
 * Retourne la somme de l'ensemble des collectes
 *
 * @param PDO $pdo
 * @return void
 */
function collects_total(PDO $pdo){
    $sql = 'SELECT sum(collect) FROM collects';
    $q = $pdo->query($sql);
    return $q->fetchColumn();
}

//var_dump(collects_fetchAll($pdo));