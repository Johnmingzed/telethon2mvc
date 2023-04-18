<?php

/**
 * Définit quelques constantes
 */

define('ROOT', dirname(__DIR__));
define('DEV', true);
define('DEBUG', true);

if(DEV){
    define('DB_HOST', '192.168.8.187');
    define('DB_USER', 'telethon2');
    define('DB_PASS', '1234');
    define('DB_NAME', 'telethon2');
}