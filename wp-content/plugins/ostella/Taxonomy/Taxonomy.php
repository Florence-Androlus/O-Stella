<?php

namespace oStella\Taxonomy;

class Taxonomy {

    /**
     * Registers the custom taxonomy
     */
    static public function register()
    {
        register_taxonomy(
            static::TAXONOMY_KEY, // on choisit l'identifiant de notre taxo
            static::RELATED_CPT_LIST, // on choisit la liste des CPT auxquels attacher notre taxo
            [
                'hierarchical' => true, // make it hierarchical (like categories) => on laisse true pour des questions d'UI dans le backoffice
                'labels' => ['name' =>  static::TAXONOMY_NAME],
                'show_ui' => true,
                'show_in_rest' => true,
                'all_items' => true,
                'add_new_items' => true,
                'capabilities' => static::CAPABILITIES
            ]
        );
    }

     /**
     * Add admin specific caps for the taxonomy
     */
    static public function addAdminCaps()
    {
        // récupérer le rôle administrateur
        $adminRole = get_role('administrator');
        // pour chaque cap prévue pour l'admin sur le CPT courant, on ajoute la cap
        foreach (static::ADMIN_CAPS as $cap => $grant) {
            $adminRole->add_cap($cap, $grant);
        }
    }

    /**
     * remove admin specific caps for the taxonomy
     */
    static public function removeAdminCaps()
    {
        // récupérer le rôle administrateur
        $adminRole = get_role('administrator');
        // pour chaque cap prévue pour l'admin sur le CPT courant, on retire la cap
        foreach (static::ADMIN_CAPS as $cap => $grant) {
            $adminRole->remove_cap($cap);
        }
    }
}