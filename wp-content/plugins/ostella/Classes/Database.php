<?php

namespace oStella\Classes;

class Database {

    static public function generateTables()
    {
        // on pourrait utiliser https://developer.wordpress.org/reference/functions/maybe_create_table/ pour gérer notre table custom
        // mais on préfère se la péter et utiliser du MySQL tout beau

        // on récupère le connecteur à la BDD (fourni par WP)
        // vu que déclaré en global, cette variable s'appelle forcément $wpdb
        global $wpdb;

        // on récupère dans la config de WP le jeu de caractères à utiliser dans notre table MySQL
        // on le définit dans une variable car peut changer d'une install à un autre
        $charsetCollate = $wpdb->get_charset_collate();

        // on récupère le nom de la table dans la constante définie sur ostella.php
        $tableName = OSTELLA_NEWSLETTER_TABLE_NAME;

        // on génére notre table newsletter
        // attention => on ne génére une table que si elle n'existe pas
        // on rédige la requête de génération de la table
        $sql = "
        CREATE TABLE IF NOT EXISTS `{$tableName}` (
            `id` BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,
            `user_email` VARCHAR(100) NOT NULL,
            PRIMARY KEY(`id`)             
        ) {$charsetCollate};
        ";

        // exécution de la requête
        $wpdb->query($sql);
    }

    static public function AddMail($user_email)
    {        
        // on récupère le connecteur à la BDD (fourni par WP)
        // vu que déclaré en global, cette variable s'appelle forcément $wpdb
        global $wpdb;

        // on récupère le nom de la table dans la constante définie sur ostella.php
        $tableName = OSTELLA_NEWSLETTER_TABLE_NAME;

        $sql = "SELECT `user_email` FROM `{$tableName}` WHERE `user_email`= (%s)";

        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $user_email,
            ]
        );

        // On execute la requête
        $success = $wpdb->query($preparedQuery);   
        if ($success==1)
        {
            return $success;
            exit;
        }
    
        // on insert un contact dans la table
        $sql = "
        INSERT INTO `{$tableName}` 
        (`user_email`) 
        VALUES 
        (%s)";

        // la chaîne $sql contient des parties variables ("%s")
        // on fournit en 2e argument un array qui contient la valeur pour remplacer ces %s dans $sql 
        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $user_email,
            ]
        );


        // exécuter la requête préparée
        // on récupère false en cas d'erreur
        // parfois on récupère un int (si plusieurs lignes sont affectées par la requête)
        $success = $wpdb->query($preparedQuery);

        // on fait en sorte de renvoyer true si pas d'erreur et false si erreur 
        // avec !! on transforme n'importe quelle valeur en booleen 
        // => le premier ! transforme en booleen et inverse sa valeur
        // => le deuxieme ! permet de réinverser la valeur booleenne 
        return !!$success;

    }

    static public function getMail()
    {
        global $wpdb;
        // on récupère le nom de la table dans la constante définie sur ostella.php
        $tableName = OSTELLA_NEWSLETTER_TABLE_NAME;


        $sql = "SELECT * FROM `{$tableName}`";
      
        $success = $wpdb->get_results($sql);

        return $success;

    }
    static public function removeMail($user_email)
    {
        global $wpdb;

        // on récupère le nom de la table dans la constante définie sur ostella.php
        $tableName = OSTELLA_NEWSLETTER_TABLE_NAME;

        
        $sql = "
            DELETE FROM `{$tableName}`
            WHERE `user_email`=%s
        ";

        $preparedQuery = $wpdb->prepare(
            $sql,
            [
                $user_email,
             ]
        );

        $success = $wpdb->query($preparedQuery);
        return !!$success;

    }
    
}