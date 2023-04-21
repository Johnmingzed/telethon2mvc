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
    // Si un mot de passe existe déjà on traite le champ de control
    if (isset($user['password'], $_POST['old_password'])) {
        // Si l'ancien mot de passe ne correspond pas on arrête le script
        if (!password_verify($_POST['old_password'], $user['password'])) {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Ancien mot de passe incorrect'
            ];
            header('Location: index.php?controller=users&action=password&id=' . $_GET['id'] . '');
            exit;
        }
    }

    if (isset($_POST['password'], $_POST['control'], $_GET['id'])) {
        // Vérification de la saisie du mot de passe
        if ($_POST['password'] === $_POST['control'] && strlen($_POST['password']) > 1) {
            // Hashage du mot de passe
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Enregistrement du mot de passe en BDD
            if (update_user($pdo, ['password' => $password, 'id_user' => $_GET['id']])) {
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Mot de passe enregistré pour l\'utilisateur : ' . $user['firstname'] . ''
                ];
                header('Location: index.php?controller=users&action=list');
                exit;
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
