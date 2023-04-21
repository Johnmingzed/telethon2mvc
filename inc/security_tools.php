<?php

/**
 * Contrôle de la provenance depuis public/index.php.
 */

if (!defined('FROM_INDEXES')) {
    die('Acces Refusé');
}

/**
 * Fonctions de sécurisation des données saisies par les utilisateurs
 */

/**
 * Retourne une variable nettoyée pour la sécurité en BDD
 * 
 * @param string $data La chaîne de caractères à nettoyer et sécuriser.
 * @return string La chaîne de caractères nettoyée et sécurisée.
 */

 function secure_data(string $data): string
 {
     $data = trim($data); // Supprime les espaces inutiles en début et fin de chaîne.
     $data = stripslashes($data); // Supprime les antislashs pour éviter les attaques de type injection de code.
     $data = htmlspecialchars($data); // Convertit les caractères spéciaux en entités HTML pour éviter les attaques de type XSS.
     return $data;
 }

/**
 * Vérifie si une chaîne de caractères est un nom valide.
 *
 * @param string $data La chaîne de caractères à valider.
 * @return string|null Retourne la chaîne de caractères si elle est valide et inférieure ou égale à 30 caractères, sinon retourne NULL.
 */

function valid_name(string $data): ?string
{
    if (strlen($data) <= 30 && preg_match("/^[a-zA-ZÀ-Ÿ '-]+$/", $data)) {
        return $data;
    } else { 
        return NULL;
    }
}
