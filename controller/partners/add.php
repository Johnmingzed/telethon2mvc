<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['phone'], $_POST['name'])) {
        if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail']) && !empty($_POST['phone']) && !empty($_POST['name'])) {
            $firstname = trim(htmlspecialchars($_POST['firstname']));
            $lastname = trim(htmlspecialchars($_POST['lastname']));
            $mail = trim(htmlspecialchars($_POST['mail']));
            $phone = trim(htmlspecialchars($_POST['phone']));
            $name = trim(htmlspecialchars($_POST['name']));
            if (add_partner($pdo, $firstname, $lastname, $mail, $phone, $name)) {
                $_SESSION['msg'] = [
                    'css' => 'success',
                    'txt' => 'Votre partenaire a été ajouté avec succès!'
                ];
                header('Location: index.php?controller=partners&actions=list');
                exit;
            } else {
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Erreur: impossible d\'ajouter le partenaire!'
                ];
            }
        } else {
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Merci de remplir tous les champs obligatoires!'
            ];
        }
    }
}

require ROOT . '/view/partners/add.view.php';
