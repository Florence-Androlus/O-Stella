<?php

namespace oStella\Role;

class MemberRole {
    
    const ROLE_KEY = 'member';
    const ROLE_NAME = 'Membre';

    /**
     * Add the member custom Role to WP
     */
    static public function add()
    {
        add_role(
            self::ROLE_KEY, // identifiant du rôle
            self::ROLE_NAME, // nom d'affichage du rôle
            // capabilities
            [                
                'read' => true,
                
                //'edit_events' => true, // cette cap concerne l'ensemble des posts (tous types confondus)
                'publish_events' => false,
                'edit_event' => true,                                
                'delete_event' => true,
                'edit_others_events' => false,
                'delete_others_events' => false,
                'edit_published_events' => false,                

                'manage_events' => true,
                'edit_events' => true,                
                'assign_events' => true,               
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
