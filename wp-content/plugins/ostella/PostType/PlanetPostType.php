<?php

namespace oStella\PostType;
 
class PlanetPostType extends PostType {
 
    const POST_TYPE_KEY =  'planet';
    const POST_TYPE_NAME = 'Planètes';
    const POST_TYPE_SLUG = 'planète';
    const POST_TYPE_REST_BASE = 'planets';

    const CAPABILITIES = [
        'edit_posts' => 'edit_planets',
        'publish_posts' => 'publish_planets',
        'edit_post' => 'edit_planet',
        'read_post' => 'read_planet',
        'delete_post' => 'delete_planet',
        'edit_others_posts' => 'edit_others_planets',
        'delete_others_posts' =>  'delete_others_planets'
    ];
    
    // on prévoit les caps pour le rôle administrateur sur les posts de ce CPT
    const ADMIN_CAPS = [
        'edit_planets' => true,
        'publish_planets' => true,
        'edit_planet' => true,
        'read_planet' => true,
        'delete_planet' => true,
        'edit_others_planets' => true,
        'delete_others_planets' => true,
        //'map_meta_cap' => true
    ];
}