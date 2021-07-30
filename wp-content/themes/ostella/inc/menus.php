<?php

/**
 * On génère 2 emplacements de menu au hook init
 */
function ostellaRegisterMenus() {
    register_nav_menus([
        'main-menu' => __( 'Main Menu' ),        
        'footer-menu' => __( 'Footer Menu' ),        
    ]);
}

function getMainMenuItems() {
    // on récupère les emplacements de menu et les id de menus associés
    // get_nav_menu_locations renvoie un array qui contient des couples 'identifiant-emplacement-menu' => id-du-menu-associé-dans-le-BO
    $menuLocations = get_nav_menu_locations();
    $headerMenuId = $menuLocations['main-menu']; 

    return wp_get_nav_menu_items($headerMenuId);
}


add_action( 'init', 'ostellaRegisterMenus' );
