<?php

namespace oStella\Classes;

class User
{
    public static function update_user()
    {
        global $oStellaCurrentUser;
        // on récupère l'utilisateur connecté et on le place dans une variable globale (=> utilisable dans le template)
        $oStellaCurrentUser = wp_get_current_user();

        // si la méthode HTTP (= le verbe de la requête) est POST => on vient de soumettre le formulaire, on doit traiter les données transmises
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // enregistrer les données de l'utilisateur fournies par $_POST
            //var_dump($_POST['user_firstname'],$_POST['user_lastname'],$_POST['user_nicename'],$_POST['user_email']);
            //die;
            $succes = wp_update_user([
                'ID' => get_current_user_id(), // on donne l'id de l'utilisateur à modifier
                'first_name' => $_POST['user_firstname'],
                'last_name' => $_POST['user_lastname'],
                'user_nicename' => $_POST['user_nicename'],
                'user_email' => $_POST['user_email'],
                'description' => $_POST['description'],
            ]);

            return $succes;
        }

    }

    public static function insert_user()
    {

         // enregistrer les données de l'utilisateur fournies par $_POST
         $userdata = [
            'first_name' => $_POST['user_firstname'],
            'last_name' => $_POST['user_lastname'],
            'user_login' => $_POST['user_login'],
            'user_email' => $_POST['user_email'],
            'user_pass' => $_POST['user_password'],
            ];

         global $user_id;
         $user_id = wp_insert_user($userdata);
         //var_dump($user_id);
        // die;
        return $user_id;
     }

     public static function connect_user()
     {
        global $error;
        // enregistrer les données de l'utilisateur fournies par $_POST
        $user_login = $_POST['user_login'];
        $user_password = $_POST['user_password'];

        // on récupère l'utilisateur connecté et on le place dans une variable globale (=> utilisable dans le template)
        global $oStellaCurrentUser;
        // On authentifie le pseudo et mot de passe
        $oStellaCurrentUser = wp_authenticate($user_login, $user_password);

        // On récupère donc inscription.php mais il faudra bien ajouter une condition dans ce fichier pour afficher l'erreur si $error n'est pas vide ou "isset"
        if (is_wp_error($oStellaCurrentUser)) {

            $error = "Le mot de passe ou le nom d'utilisateur est incorrect.";
            return $error; 
        }
        // Si on a pas une WP_Error
        if (!is_wp_error($oStellaCurrentUser)) {
            // On clean 
            clean_user_cache($oStellaCurrentUser->ID);
            wp_clear_auth_cookie();
            // ces 3 actions permettent de log le user
            wp_set_current_user($oStellaCurrentUser->ID, $oStellaCurrentUser->user_login);
            wp_set_auth_cookie($oStellaCurrentUser->ID);
            do_action('wp_login', $oStellaCurrentUser->user_login);
            wp_redirect(get_home_url());
            exit;
        }

     }
     public static function delete_user($user_id)
     {
        require_once(ABSPATH.'wp-admin/includes/user.php');
        $success = wp_delete_user(intval($user_id),1);
        return $success;
      }

}