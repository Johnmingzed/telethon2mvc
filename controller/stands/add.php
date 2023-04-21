<?php
    if (!defined('FROM_INDEXES')) {
        die('Prout');
    }
    require_once ROOT.'/model/stands.model.php';

    if(isset($_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'],   $_FILES['picture'], $_POST['notes'])){
        if(!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['phone']) && !empty($_POST['place'])){
            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                if(read_stands_by_name_stands($pdo, $_POST['name']) == false){
                    if(read_stands_by_email($pdo, $_POST['mail']) == false){
                        if(!file_exists(ROOT.'/public/images/'.$_FILES['picture'])){

                            // Déplacement de la photo dans le dossier prevu

                            $nameFichier = explode('.', $_FILES['picture']['name']);
                            $tmp_nom = $_FILES['picture']['tmp_name'];

                            $time = date("Y-m-d_H_i_s");
                            $nouveau_nom_de_photo = $nameFichier[0].'_'.$time.'.'.$nameFichier[1];
                            $deplacer_img = move_uploaded_file($tmp_nom, ROOT.'/public/images/'.$nouveau_nom_de_photo);

                            $logo = empty($nouveau_nom_de_photo) ? NULL : $nouveau_nom_de_photo;
                           
                            $notes = empty($_POST['notes']) ? NULL : $_POST['notes'];
                            
                            add_stands($pdo, $_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'], $logo, $notes);

                            $_SESSION['msg'] = [
                                'css' => 'success',
                                'txt' => 'Félicitation, votre stand a bien été ajouté !'
                            ];
                            header('Location: index.php?controller=stands');
                            exit;
                        }else{
                            $_SESSION['msg'] = [
                                'css' => 'warning',
                                'txt' => 'Votre logo existe déjà !'
                            ];
                            header('Location: index.php?controller=stands');
                            exit;
                        }
                    }else{
                        $_SESSION['msg'] = [
                            'css' => 'warning',
                            'txt' => 'Cet email existe déjà !'
                        ];
                        header('Location: index.php?controller=stands');
                        exit;
                    }
                }else{
                    $_SESSION['msg'] = [
                        'css' => 'warning',
                        'txt' => 'Ce nom de stand existe déjà !'
                    ];
                    header('Location: index.php?controller=stands');
                    exit;
                }
            }else{
                $_SESSION['msg'] = [
                    'css' => 'warning',
                    'txt' => 'Votre adresse mail n`\'est pas bonne !'
                ];
                header('Location:, index.php?controller=stands');
                exit;
            }
        }else{
            $_SESSION['msg'] = [
                'css' => 'warning',
                'txt' => 'Veuillez remplir tout les champs !'
            ];
            header('Location: index.php?controller=stands');
            exit;
        }
    }

    require_once ROOT.'/view/stands/add.view.php';