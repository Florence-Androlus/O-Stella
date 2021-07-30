<?php

function ostellaThemeSupports() {
    add_theme_support('post-thumbnails');
}

add_action('init', 'ostellaThemeSupports');