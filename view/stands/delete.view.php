<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    require_once ROOT.'/model/stands.model.php';

    if(isset($_POST['id']) && isset($_GET['confirmation']) === 'yes'){
        if(!empty($_POST['id'])){
            if(delete($pdo, $_POST['id'])){
                $connexion = "Félicitation, votre stand a bien été mis à jour !";
                header('Location: index.php?controller=stands');
            }
        }
    }elseif(isset($_GET['confirmation']) === 'yes'){
        $listStands = read_stands_by_id($pdo, $_GET['id']);
    }

    require_once ROOT.'/view/stands/delete.view.php';