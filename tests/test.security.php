<?php

define('FROM_INDEXES', true);

// Affichage des erreurs
error_reporting(E_ALL);

require_once __DIR__ . '/../inc/conf.php';
require_once __DIR__ . '/../model/users.model.php';
require_once __DIR__ . '/../model/collects.model.php';
require_once __DIR__ . '/../inc/debug.php';
require_once __DIR__ . '/../inc/security_tools.php';

// Test de sécurité
$hack = '<script type="text/javascript">alert(\'Intrusion\')</script><?php die; ?>';
$ok = 'Inférieur à trente let\' yep';
echo '<h3>Test de la fonction secure_data (réussite)</h3>';
echo secure_data($ok);
echo '<h3>Test de la fonction secure_data (échec)</h3>';
echo secure_data($hack);

echo '<h3>Test de la fonction valid_name (réussite)</h3>';
var_dump(valid_name($ok));
echo '<h3>Test de la fonction valid_name (échec)</h3>';
var_dump(valid_name($hack));
echo htmlspecialchars($hack);

echo '<h2>FIN DES TESTS<h2>';