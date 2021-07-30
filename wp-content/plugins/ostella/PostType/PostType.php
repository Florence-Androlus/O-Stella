<?php

namespace oStella\PostType;

class PostType {
    /**
     * register the custom post type
     */
    static public function register()
    {
        register_post_type(
            // static:: permet de récupérer une valeur statique (méthode statique ou constante) depuis une classe qui hérite de la classe courante
            static::POST_TYPE_KEY, // on décide de l'identifiant de notre CPT
            [
                'label' => static::POST_TYPE_NAME,
                'public' => true,
                'has_archive' => true,
                "rewrite" => [
                    'slug' => static::POST_TYPE_SLUG
                ],
                'supports' => [
                    'title',
                    'author',
                    'editor',
                    'thumbnail',
                    'comments'
                ],
                'capabilities' => static::CAPABILITIES,
                'show_in_rest' => true
            ]
        );
    }

    /**
     * Add admin specific caps for the custom post type
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
     * remove admin specific caps for the custom post type
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