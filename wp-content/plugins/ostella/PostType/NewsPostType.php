<?php

namespace oStella\PostType;
 
class NewsPostType extends PostType {
 
    const POST_TYPE_KEY =  'news';
    const POST_TYPE_NAME = 'Newsletter';
    const POST_TYPE_SLUG = 'Newsletter';
    const POST_TYPE_REST_BASE = 'newsletter';

    const CAPABILITIES = [
        'edit_posts' => 'edit_news',
        'publish_posts' => 'publish_news',
        'edit_post' => 'edit_news',
        'read_post' => 'read_news',
        'delete_post' => 'delete_news',
        'edit_others_posts' => 'edit_others_news',
        'delete_others_posts' =>  'delete_others_news'
    ];
    
    // on prévoit les caps pour le rôle administrateur sur les posts de ce CPT
    const ADMIN_CAPS = [
        'edit_news' => true,
        'publish_news' => true,
        'edit_news' => true,
        'read_news' => true,
        'delete_news' => true,
        'edit_others_news' => true,
        'delete_others_news' => true
    ];
}