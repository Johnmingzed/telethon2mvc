<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    require_once ROOT.'/model/stands.model.php';

    if(isset($_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'],   $_FILE['picture'], $_POST['notes'])){
        if(!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['phone']) && !empty($_POST['place'])){
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                if(read_stands_by_name_stands($pdo, $_POST['name']) == false){
                    if(read_stands_by_email($pdo, $_POST['mail']) == false){
                        if(!file_exists(ROOT.'/public/images/'.$_FILE['picture'])){

                            // Déplacement de la photo dans le dossier prevu

                            $nameFichier = explode('.', $_FILE['picture']);
                            $time = time();
                            $nouveau_nom_de_photo = $nameFichier[0].$time.'.'.$nameFichier[1];
                            $deplacer_img = move_uploaded_file();

                            $logo = empty($_POST['picture']) ? NULL : $_POST['picture'];
                           
                            $notes = empty($_POST['notes']) ? NULL : $_POST['notes'];

                            var_dump($notes);
                            var_dump($_POST['phone']);

                            add_stands($pdo, $_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'], $logo,$notes);

                            $connexion = "Félicitation, votre stand a bien été ajouté !";
                            header('Location: index.php?controller=stands');
                        }else{
                            $connexion = "Votre logo existe déjà !";
                            header('Location: index.php?controller=stands');
                        }
                    }else{
                        $connexion = "Cet email existe déjà !";
                        header('Location: index.php?controller=stands');
                    }
                }else{
                    $connexion = "Ce nom de stand existe déjà !";
                    header('Location: index.php?controller=stands');
                }
            }else{
                $connexion = "Votre adresse mail n'est pas bonne !";
                header('Location:, index.php?controller=stands');
            }
        }else{
            $connexion = "Veuillez remplir tout les champs !";
            header('Location: index.php?controller=stands');
        }
    }

    require_once ROOT.'/view/stands/add.view.php';