<?php

function ostellaEnqueueStyles()
{
    wp_enqueue_style('main', OSTELLA_ASSETS_DIST_URI . '/main.css');
    //wp_enqueue_style('semantic', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css');//
}

function ostellaEnqueueScripts()
{
    wp_enqueue_script('main', OSTELLA_ASSETS_DIST_URI . '/main.js', ['jquery'], false, true);


    //wp_enqueue_script('fond1', OSTELLA_ASSETS_DIST_URI . '/fond1.js', ['jquery'], false, true);
    //wp_enqueue_script('page_404', OSTELLA_ASSETS_DIST_URI . '/404.js', ['jquery'], false, true);
    //wp_enqueue_script('ostella-fond1', get_template_directory_uri() . '/assets/js/fond1.js', []);
    //wp_enqueue_script('ostella-404', get_template_directory_uri() . '/assets/js/404.js', []);
    wp_enqueue_script('ostella-iframe', get_template_directory_uri() . '/assets/js/iframe.js', []);
    //wp_enqueue_script('ostella-iframe', get_template_directory_uri() . '/assets/js/icon.js', []);
    // wp_enqueue_script('semantic', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js', ['jquery']);//
}

add_action('wp_enqueue_scripts', 'ostellaEnqueueStyles');
add_action('wp_enqueue_scripts', 'ostellaEnqueueScripts');
