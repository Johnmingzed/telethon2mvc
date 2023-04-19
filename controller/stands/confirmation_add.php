<?php 
    if(isset($_POST['name'], $_POST['place'], $_POST['mail'], $_POST['phone'], $_POST['picture'], $_POST['notes'])){
        if(!empty($_POST['name']) && !empty($_POST['place']) && !empty($_POST['mail']) && !empty($_POST['phone'])){
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                if(read_stands_by_name_stands($pdo, $_POST['name']) == false){
                    if(read_stands_by_email($pdo, $_POST['mail']) == false){
                        $logo = empty($_POST['picture']) ? NULL : $_POST['picture'];
                        $notes = empty($_POST['notes']) ? NULL : $_POST['notes'];

                        var_dump($notes);
                        var_dump($_POST['phone']);

                        add_stands($pdo, $_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'], $logo, $notes);

                        $connexion = "Cet email existe déjà !";
                        header('Refresh: 3, index.php?controller=stands');
                    }else{
                        $connexion = "Cet email existe déjà !";
                        header('Refresh: 3, index.php?controller=stands');
                    }
                }else{
                    $connexion = "Ce nom de stand existe déjà !";
                    header('Refresh: 3, index.php?controller=stands');
                }
            }else{
                $connexion = "Votre adresse mail n'est pas bonne !";
                header('Refresh: 3, index.php?controller=stands');
            }
        }else{
            $connexion = "Veuillez remplir tout les champs !";
            header('Refresh: 3, index.php?controller=stands');
        }
    }
?>