<?php

namespace oStella\Role;

class ModeratorRole {
    
    const ROLE_KEY = 'moderator';
    const ROLE_NAME = 'Moderateur';

    /**
     * Add the customer custom Role to WP
     */
    static public function add()
    {
        add_role(
            self::ROLE_KEY, // identifiant du rôle
            self::ROLE_NAME, // nom d'affichage du rôle
                        
            // liste des capabilities : https://wordpress.org/support/article/roles-and-capabilities/#capabilities

            // On rajoute 'moderate_comments', 'edit_published_events' et 'edit_others_posts' pour permettre au modérateur
            // de gérer les commentaires, mais attention aux débordements ! 
            // https://www.diije.fr/wordpress-moderation-commentaires-par-contributeurs/

            // 'event/events' remplace 'post/posts' dans notre CPT 'event'
            [
                'edit_comment' => true,
                'moderate_comments' => true,
                'upload_files' => true,
                'edit_dashboard' => false,
                
                'edit_events' => true, // cette cap concerne l'ensemble des posts (tous types confondus)                                
                'publish_events' => true,
                'edit_event' => true,
                'read_event' => true,
                'delete_event' => true,
                'edit_others_events' => true,
                'edit_published_events' => true,
                'delete_others_events' => false,

                'manage_event' => true,                
                'delete_event' => true,
                'assign_event' => true,                
            ]
        );
    }

    /**
     * Remove the customer Role
     */
    static public function remove()
    {
        remove_role(self::ROLE_KEY);
    }
}