<?php

// Affichage des erreurs
error_reporting(E_ALL);

require_once __DIR__ . '/users.model.php';
require_once __DIR__ . '/../inc/debug.php';

echo 'Test de la fonction get_password : ';
var_dump(get_password($pdo, 'nia1512@gmail.com'));

echo '<br>Test de la fonction fetch_user_by_mail :';
debug(fetch_user_by_mail($pdo, 'jambonbill@gmail.com'));

echo '<br>Test de la fonction fetch_user_by_id :';
debug(fetch_user_by_id($pdo, 2));

echo '<br>Test de la fonction users_fetchAll : ';
debug(users_fetchAll($pdo));

echo '<br>Test de la fonction add_user : ';
if(add_user($pdo, 'toto5@toto.fr', 'Edouard', 'TOTAL')){
    echo 'Utilisateur ajouté';
} else {
    echo 'Impossible d\ajouter l\'utilisateur';
}

echo '<br>Test de la fonction delete_user : ';
if(delete_user($pdo, 24)){
    echo 'Utilisateur effacé';
} else {
    echo 'Impossible d\'effacer l\'utilisateur';
}