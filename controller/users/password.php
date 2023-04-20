<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

/* echo '<br>$_POST :';
debug($_POST);
echo '<br>$_GET : ';
debug($_GET); */

if (isset($_GET['id'])) {
    $user = fetch_user_by_id($pdo, $_GET['id']);
    if (isset($_POST['password'], $_POST['control'], $_GET['id'])) {
        // Vérification de la saisie du mot de passe
        if ($_POST['password'] === $_POST['control'] && strlen($_POST['password']) > 7) {
            // Hashage du mot de passe
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Enregistrement du mot de passe en BDD
            if (update_user($pdo, ['password' => $password, 'id_user' => $_GET['id']])) {
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Mot de passe enregistré pour l\'utilisateur ID : ' . $_GET['id'] . ''
                ];
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Erreur'
                ];
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Mot de passe invalide'
            ];
        }
    }
} else {
    header('Location: index.php?controller=users&action=list');
    exit;
}

require ROOT . '/view/users/password.view.php';
