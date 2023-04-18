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

var_dump(collects_fetchAll($pdo));