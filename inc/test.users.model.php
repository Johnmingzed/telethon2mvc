<?php

define('FROM_INDEXES', true);

// Affichage des erreurs
error_reporting(E_ALL);

require_once __DIR__ . '/../inc/conf.php';
require_once __DIR__ . '/../model/users.model.php';
require_once __DIR__ . '/../model/collects.model.php';
require_once __DIR__ . '/../inc/debug.php';

// Tests unitaires
echo '<br>Test de la fonction add_user : ';
if($user_id = add_user($pdo, 'toto6@toto.fr', 'Edouard', 'TOTAL')){
    echo 'Utilisateur ' . $user_id . ' ajouté';
} else {
    echo 'Impossible d\ajouter l\'utilisateur';
}

echo '<br>Test de la fonction collects_total : ';
var_dump(collects_total($pdo));
echo collects_total($pdo) . ' € collectés à présent.';

echo '<br>Test de la fonction get_password : ';
var_dump(get_password($pdo, 'toto6@toto.fr'));

echo '<br>Test de la fonction fetch_user_by_mail :';
debug(fetch_user_by_mail($pdo, 'toto6@toto.fr'));

echo '<br>Test de la fonction fetch_user_by_id :';
debug($user = fetch_user_by_id($pdo, $user_id));

echo '<br>Test de la fonction users_fetchAll : ';
debug(users_fetchAll($pdo));

echo '<br>Test de la fonction delete_user : ';
if(delete_user($pdo, $user_id)){
    echo 'Utilisateur '.$user['firstname'].' effacé';
} else {
    echo 'Impossible d\'effacer l\'utilisateur';
}

/* echo '<br>Test de la fonction update_user : ';
$data = [
    'id_user' => 21,
    'lastname' => 'SHELL'
];
debug($data);
update_user($pdo, $data); */