<?php

namespace oStella\Classes;

class Post
{

    public static function edit_post()
    {
        $eventPost = [
            'ID' => $_POST['editPost-event-ID'],
            'post_title' => $_POST['event-title'],
            'post_content' => $_POST['description'],
            'post_type' => 'event',
            'post_status'   => 'draft',
            'tax_input'    => [
                'event' => $_POST['taxo-event'], //is Taxnmony Name and being used as key of array.
            ],
        ];
        // on met à jour le post
        global $currentPost;
        $currentPost = wp_update_post($eventPost);
        return  $currentPost;
    }

    public static function publish_post()
    {

        $eventPost = [
            'ID' => $_POST['publishPost-event-ID'],
            'post_type' => 'event',
            'post_status'   => 'publish',
            'tax_input'    => [
                'event' => $_POST['taxo-event'], //is Taxnmony Name and being used as key of array.
            ],
        ];

        // on met à jour le post
        $currentPost = wp_update_post($eventPost);
        return  $currentPost;
    }

    public static function insert_post()
    {
  
        // enregistrer les données du post fournies par $_POST
        $eventPost = [
            'post_title' => $_POST['event-title'],
            'post_content' => $_POST['description'],
            'post_type' => 'event',
            'tax_input'    => [
                'event' => $_POST['taxo-event'], //is Taxnmony Name and being used as key of array.
            ],
        ];

        if (wp_get_current_user()->roles[0] != "member") {
            $eventPost ['post_status'] = 'publish';
        }

    $currentPost = wp_insert_post($eventPost);

    return  $currentPost;
    }

}