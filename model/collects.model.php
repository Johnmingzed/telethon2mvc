<?php

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
function collects_add(PDO $pdo, string $collect, int $partner_id = null, int $stand_id = null){
    $sql = 'INSERT INTO collects(collects.collect, collects.partner_id, collects.stand_id) VALUES (:collect, :partner_id, :stand_id)';

    $q = $pdo->prepare($sql);
    $q->bindValue(':collect', $collect);
    $q->bindValue(':partner_id', $partner_id);
    $q->bindValue(':stand_id', $stand_id);
    return $q->execute();
}


//var_dump(collects_fetchAll($pdo));