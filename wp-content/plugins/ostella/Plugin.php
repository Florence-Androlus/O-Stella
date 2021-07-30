<?php

namespace oStella;

use oStella\Classes\Router;
use oStella\Classes\Database;
use oStella\Role\ModeratorRole;
use oStella\Role\MemberRole;
use oStella\Taxonomy\EventTaxonomy;
use oStella\PostType\EventPostType;
use oStella\PostType\NewsPostType;
use oStella\PostType\PlanetPostType;
use oStella\PostType\ConstellationPostType;

class Plugin
{
    /**
     * Starts the plugin
     */
    public function run()
    {
        // cette méthode permet de démarrer le plugin = déclarer les actions à réaliser via des hooks
        // pour le callable, en POO on doit donner le contexte (classe ou objet) pour retrouver la méthode
        // ici : dans $this, on appelle la méthode registerPostTypes lors de l'init de WP
        // pour utiliser une méthode avec un hook elle doit être publique
        add_action('init', [$this, 'registerPostTypes']);

        // Ajout des Taxo `constellation`, `planete` et 'event'
        add_action('init', [$this, 'registerTaxonomies']);

        // on ajoute nos URL custom
        add_action('init', [$this, 'registerCustomRewrites']);


        // déclaration du hook d'activation du plugin
        // le 1e argument doit être le chemin vers le fichier-point d'entrée du plugin
        // 2e argument : un callable, càd une fonction à déclencher lorsque le hook est déclenché
        register_activation_hook(OSTELLA_PLUGIN_FILE, [$this, 'onPluginActivation']);
        register_deactivation_hook(OSTELLA_PLUGIN_FILE, [$this, 'onPluginDeactivation']);
    }

    public function registerCustomRewrites()
    {
        Router::init();
    }

    /**
     * register our custom post types
     */
    public function registerPostTypes()
    {
        EventPostType::register();
        NewsPostType::register();
        PlanetPostType::register();
        ConstellationPostType::register();
    }

    /**
     * Register our custom taxonomies
     */
    static public function registerTaxonomies()
    {
        EventTaxonomy::register();
    }

    /**
     * Triggers on plugin activation
     */
    public function onPluginActivation()
    {
        // créer le rôle "membre"
        MemberRole::add();
        // créer le rôle "moderateur"
        ModeratorRole::add();

        EventTaxonomy::addAdminCaps();

        // on génère les tables custom
        Database::generateTables();
    }

    public function onPluginDeactivation()
    {
        // on retire le rôle "membre"
        MemberRole::remove();
        // on retire le rôle "moderateur"
        ModeratorRole::remove();

        EventTaxonomy::removeAdminCaps();
    }
}
