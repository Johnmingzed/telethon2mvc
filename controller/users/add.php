<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

 if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

if (isset($_POST['mail'])) {
    if (!empty($_POST['mail'])) {
        $_POST['firstname'] = empty($_POST['firstname']) ? NULL : ucfirst(strtolower($_POST['firstname']));
        $_POST['lastname'] = empty($_POST['lastname']) ? NULL : strtoupper($_POST['lastname']);
        $_POST['is_admin'] = isset($_POST['is_admin']) && $_POST['is_admin'] === 'on';

        // On vérifie que l'adresse mail est unique
        // Pourrait être remplacé par une fonction de users.model.php
        $sql = "SELECT COUNT(*) FROM users WHERE mail = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$_POST['mail']]);
        if ($q->fetchColumn() === 0) {
            // Si elle est unique on enregistre l'utilisateur
            if ($last_user = add_user($pdo, $_POST['mail'], $_POST['firstname'], $_POST['lastname'], $_POST['is_admin'])) {
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Le nouvel utilisateur a bien été créé sous l\'ID : ' . $last_user . '.'
                ];
                // Enregistrement de l'image
                require_once ROOT . '/model/upload.php';
                update_user($pdo, [
                    'id_user' => $last_user,
                    'picture' => $user_picture
                ]);
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Action impossible.'
                ];
                header('Location: index.php?controller=users&action=edit&id=new');
                exit;
            }
        } else {
            // Sinon on affiche un message d'erreur
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Cette adresse est déjà utilisée.'
            ];
            header('Location: index.php?controller=users&action=edit&id=new');
            exit;
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Merci de compléter tout les champs.'
        ];
        header('Location: index.php?controller=users&action=edit&id=new');
        exit;
    }
}

header('Location: index.php?controller=users&action=list');
