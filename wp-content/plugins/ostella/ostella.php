<?php 
/* 
Plugin Name: oStella 
*/

namespace oStella;

// on récupère la globale $wpdb pour récupérer des infos sur la BDD
global $wpdb;

// on utilise l'autoload PSR4 de composer
require __DIR__ . '/vendor/autoload.php';

// on stocke le chemin vers ce fichier dans une constante
// => sera utile pour les hook d'activation et désactivation
define('OSTELLA_PLUGIN_FILE', __FILE__);
define('OSTELLA_TEMPLATES_DIR', __DIR__ . '/templates/');

// on stocke le nom de la table custom newsletter
define('OSTELLA_NEWSLETTER_TABLE_NAME', $wpdb->prefix . 'newsletter');


$ostella = new Plugin();
$ostella->run();