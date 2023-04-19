<?php

/* $_POST['id'] = $_GET['id'];
$_POST['is_admin'] = (isset($_POST['is_admin']) && $_POST['is_admin'] === 'on') ? 1 : 0;
die; */

if (isset($_GET['id'], $_POST['mail'])) {
    if (!empty($_POST['mail']) && !empty($_GET['id'])) {
        $_POST['firstname'] = empty($_POST['firstname']) ? NULL : ucfirst(strtolower($_POST['firstname']));
        $_POST['lastname'] = empty($_POST['lastname']) ? NULL : strtoupper($_POST['lastname']);
        $_POST['is_admin'] = ($_POST['is_admin'] === 'on') ? 1 : 0;
        $_POST['id_user'] = $_GET['id'];

        // On vérifie que l'adresse mail n'est pas attribuée à un autre utilisateur
        $sql = "SELECT COUNT(*) FROM users WHERE mail = :mail AND id_user != :id_user";
        $q = $pdo->prepare($sql);
        $q->bindValue(':mail', $_POST['mail']);
        $q->bindValue(':id_user', $_POST['id_user']);
        $q->execute();
        if ($q->fetchColumn() === 0) {
            // Si elle est unique on enregistre les modifications
            if (update_user($pdo, $_POST)) {
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'L\'utilisateur ID : ' . $_POST['id_user'] . ' a bien été modifié.'
                ];
                // Enregistrement de l'image
                require_once ROOT . '/model/upload.php';
                update_user($pdo, [
                    'id_user' => $_POST['id_user'],
                    'picture' => $user_picture
                ]);
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Action impossible.'
                ];
                header('Location: index.php?controller=users&action=edit&id=' . $_GET['id'] . '');
                exit;
            }
        } else {
            // Sinon on affiche un message d'erreur
            $_SESSION['msg'] = [
                'css' => 'success',
                'txt' => 'Cette adresse est déjà utilisée.'
            ];
            header('Location: index.php?controller=users&action=edit&id=' . $_GET['id'] . '');
            exit;
        }
    } else {
        $_SESSION['msg'] = [
            'css' => 'warning',
            'txt' => 'Merci de compléter tout les champs.'
        ];
        header('Location: index.php?controller=users&action=edit&id=' . $_GET['id'] . '');
        exit;
    }
}

header('Location: index.php?controller=users&action=list');
