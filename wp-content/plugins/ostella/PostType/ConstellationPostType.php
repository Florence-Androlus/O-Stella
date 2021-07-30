<?php

namespace oStella\PostType;
 
class ConstellationPostType extends PostType {
 
    const POST_TYPE_KEY =  'constellation';
    const POST_TYPE_NAME = 'Constellations';
    const POST_TYPE_SLUG = 'constellation';
    const POST_TYPE_REST_BASE = 'constellations';

    const CAPABILITIES = [
        'edit_posts' => 'edit_constellations',
        'publish_posts' => 'publish_constellations',
        'edit_post' => 'edit_constellation',
        'read_post' => 'read_constellation',
        'delete_post' => 'delete_constellation',
        'edit_others_posts' => 'edit_others_constellations',
        'delete_others_posts' =>  'delete_others_constellation'
    ];
    
    // on prévoit les caps pour le rôle administrateur sur les posts de ce CPT
    const ADMIN_CAPS = [
        'edit_constellations' => true,
        'publish_constellations' => true,
        'edit_constellation' => true,
        'read_constellation' => true,
        'delete_constellation' => true,
        'edit_others_constellations' => true,
        'delete_others_constellations' => true
    ];
}