<?php
    if(basename(ROOT.'/public/images/'.$_POST['picture'].'.png', '.png') === $_POST['picture'] or basename(ROOT.'/public/images/'.$_POST['picture'].'.jpg', '.jpg') === $_POST['picture']){
    $namePicture = explode();
    $logo = empty($_POST['picture']) ? NULL : $_POST['picture'];
    $notes = empty($_POST['notes']) ? NULL : $_POST['notes'];

    var_dump($notes);
    var_dump($_POST['phone']);

    add_stands($pdo, $_POST['name'], $_POST['mail'], $_POST['phone'], $_POST['place'], $logo, $notes);

    $connexion = "Félicitation, votre stand a bien été ajouté !";
    header('Location: index.php?controller=stands');
    }else{

    }