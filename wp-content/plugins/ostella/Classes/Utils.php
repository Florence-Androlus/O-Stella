<?php

namespace oStella\Classes;

use oStella\PostType\EventPostType;

use WP_Query;

class Utils {

    /**
     * Récupérer le post de type event lié à l'utilisateur dont on passe l'id en param
     * 
     * @param $userId
     */
    static public function getEventPost($userId)
    {
        // on fait une requête custom pour récupérer le post lié à l'user
        $query = new WP_Query([
            'author' => $userId, // on récupère seulement les résultats d'un auteur donné
            'event' => EventPostType::POST_TYPE_KEY//

        ]);

        // on renvoie le post trouvé
        // on utilise l'index 0 car même s'il n'y a qu'un seul résultat, on récupère un array avec WP_Query->posts
        return $query->posts[0];
    }
}