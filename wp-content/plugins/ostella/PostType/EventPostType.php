<?php

namespace oStella\PostType;
 
class EventPostType extends PostType {
 
    const POST_TYPE_KEY =  'event';
    const POST_TYPE_NAME = 'Evénements';
    const POST_TYPE_SLUG = 'Type d\'événement';
    const POST_TYPE_REST_BASE = 'événements';

    const CAPABILITIES = [
        'edit_posts' => 'edit_events',
        'publish_posts' => 'publish_events',
        'edit_post' => 'edit_event',
        'read_post' => 'read_event',
        'delete_post' => 'delete_event',
        'edit_others_posts' => 'edit_others_events',
        'delete_others_posts' =>  'delete_others_events',
        //tentative d'ouverture aux commentaires
        //'edit_comments' => 'edit_comments'
    ];
    
    // on prévoit les caps pour le rôle administrateur sur les posts de ce CPT
    const ADMIN_CAPS = [
        'edit_events' => true,
        'publish_events' => true,
        'edit_event' => true,
        'read_event' => true,
        'delete_event' => true,
        'edit_others_events' => true,
        'delete_others_events' => true
    ];
}