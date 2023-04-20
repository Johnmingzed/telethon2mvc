<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    require_once ROOT.'/model/stands.model.php';

    if(isset($_GET['id']) && isset($_GET['confirmation'])){
        if($_GET['confirmation'] === 'yes'){
            delete($pdo, $_GET['id']);
            $connexion = "Félicitation, votre stand a bien été supprimé !";
            header('Location: index.php?controller=stands');
        }
    }elseif(isset($_GET['confirmation'])){
        if($_GET['confirmation'] === 'no'){
            header('Location: index.php?controller=stands');
        }
    }
        $listStands = read_stands_by_id($pdo, $_GET['id']);

    require_once ROOT.'/view/stands/delete.view.php';