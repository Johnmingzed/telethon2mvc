<?php

//Import Upload classes into the global namespace
use Verot\Upload\Upload;

//Load Composer's autoloader
require ROOT . '/vendor/autoload.php';

$handle = new Upload($_FILES['picture']);
if ($handle->uploaded) {
    $handle->file_new_name_body   = 'user';
    $handle->image_resize         = true;
    $handle->image_x              = 250;
    $handle->image_ratio_y        = true;
    $handle->process(ROOT . '/public/images/');
    if ($handle->processed) {
        $_SESSION['msg']['txt'] .= ' Image de profil enregistrée sous le nom : ' . $user_picture = $handle->file_dst_name;
        $handle->clean();
    } else {
        $_SESSION['msg']['txt'] .=  ' error : ' . $handle->error;
    }
}