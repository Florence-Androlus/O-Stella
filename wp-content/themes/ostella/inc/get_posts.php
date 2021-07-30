<?php

add_action( 'pre_get_posts', 'event_pre_get_posts' );
function event_pre_get_posts($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_home()) {
            // On change le post type sur home.php pour que wordpress croit qu'on est sur une page des événéments
            $query->set('post_type', array( 'event' ) );
            
            $query->is_single = false;
            $query->is_singular = false;
        }
    }
}



// on peut créer nos propres "templates tags"
// par ex. une fonction pour charger les trois posts de la page d'accueil
function getFrontPagePosts()
{

    // First, initialize how many posts to render per page
    $per_page = 10;

    // Next, get the current page
    $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    $current_user = wp_get_current_user();

    $post_status = 'publish,draft';

    if ($current_user->roles[0] =="moderator" || $current_user->roles[0] == "administrator"  ) {
        $post_status = 'publish,pending,any';
    }
    // pour récupérer des données de façon personnalisée dans WP, on utilise un objet WP_Query
    // pour préciser le contenu à récupérer (=> déterminer la requête effectuée par WP en BDD), on utilise un array qui contient des arguments
    $args = [
        'post_type' => 'event', // on récupère les contenus de type "article"
        'post_status' => $post_status, // on ne récupère que les Posts publiés (pas de posts mis en brouillon, en attente de relecture...)
        'order' => 'DESC',  // on trie dans l'ordre décroissant
        'orderby' => 'date', // on trie sur le champ "date",
        'posts_per_page' => $per_page, // on définit le nombre d'éléments à récupérer
        'paged'          => $current_page,

    ];

     if(isset($_GET['event'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'event',
                'terms' => intval($_GET['event']) , // $categoryId,
            ]
        ];
    }    

    $frontpagePosts = new WP_Query($args);

    // on retourne l'ensemble des posts récupérés
    return $frontpagePosts;
    
}