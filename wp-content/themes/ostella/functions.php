<?php
// on déclare une constante qui contient les id des catégories à utiliser sur la page d'accueil
// dans l'administration, dans l'url de la page de modification de la catégorie, on peut trouver l'id en tant que paramètre d'URL "tag_ID"
define('OSTELLA_HOME_CATEGORIES_ID', [10]);

define('OSTELLA_ASSETS_DIST_URI', get_template_directory_uri() . '/assets/dist');

// on require les fichiers nécessaires
require __DIR__ . '/inc/menus.php';
require __DIR__ . '/inc/scripts.php';
require __DIR__ . '/inc/supports.php';
require __DIR__ . '/inc/get_posts.php';

// cache la bare d'administration de wp lorsqu'un utilisateur se connecte 
show_admin_bar(false);

function videogif($atts = [])
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    // override default attributes with user attributes
    $wporg_atts = shortcode_atts([
            'mp4' => $atts['mp4'],
            'style' => null,
            'controls' => False
        ], $atts);

    // build output
    $o = '';
    $o .= '<video autoplay loop muted playsinline ';
    if ($wporg_atts['controls']) $o .= 'controls ';
    $o .= 'class="videogif"';
    if (!is_null($wporg_atts['style'])) $o .= 'style="' . $wporg_atts['style'] . '" ';
    $o .= '><source src="' . $wporg_atts['mp4'] . '" type="video/mp4" />';
    $o .= '<p>Your browser does not support the video element.</p></video>';

    // return output
    return $o;
}
add_shortcode( 'videogif', 'videogif' );
