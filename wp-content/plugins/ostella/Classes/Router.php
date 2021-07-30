<?php

namespace oStella\Classes;

class Router
{

    static public function init()
    {

        // si l'URL courante est /user/dashboard, afficher le template user-dashboard.php du thème
        // 1. ajout de la réécriture = on permet à WP de reconnaître notre URL custom : 

        add_rewrite_rule('userregister', 'index.php?ostella-page=userregister', 'top');
        add_rewrite_rule('userconnect', 'index.php?ostella-page=userconnect', 'top');
        add_rewrite_rule('userdisconnect', 'index.php?ostella-page=userdisconnect', 'top');
        add_rewrite_rule('profil', 'index.php?ostella-page=profil', 'top');
        add_rewrite_rule('contact', 'index.php?ostella-page=contact', 'top');
        add_rewrite_rule('ajout-evenement', 'index.php?ostella-page=ajout-evenement', 'top');
        add_rewrite_rule('edit-planet', 'index.php?ostella-page=edit-planet', 'top');
        add_rewrite_rule('edit-constel', 'index.php?ostella-page=edit-constel', 'top');
        add_rewrite_rule('newsletter', 'index.php?ostella-page=newsletter', 'top');
        add_rewrite_rule('publish-newsletter', 'index.php?ostella-page=publish-newsletter', 'top');
        add_rewrite_rule('equipe', 'index.php?ostella-page=equipe', 'top');

        // 2. on rafraîchit les réécritures au sein de WP
        flush_rewrite_rules();

        // 3. Autoriser notre query var (paramètre d'URL) custom dans WP
        add_filter('query_vars', function ($query_vars) {
            $query_vars[] = 'ostella-page'; // on rajoute notre propre query var en tant que query var autorisée

            // on return le tableau $query_vars
            return $query_vars;
        });

        // 4. Surcharger (ou pas !) le choix de template fait par WP
        // $template contient le chemin vers le fichier de template que WP comptait charger si on ne l'avait pas interrompu
        add_action('template_include', function ($template) {
            // on vérifie si notre query var custom est présente et a une valeur qu'on connaît
            // pour lire une query var, on utilise get_query_var()

            if (get_query_var('ostella-page') == 'profil') {
                if (isset($_POST['update_user'])) {

                    $user_id = User::update_user();


                    if (!is_wp_error($user_id) && $user_id != null) {
                        global $error;
                        $error = "Vos modifications ont bien été prises en compte";
                        // si c'est le cas, on réagit en conséquence
                        return get_template_directory() . '/profil.php';
                        exit;
                    }
                } else if (isset($_POST['delete_user'])) {

                    $error = User::delete_user($_POST['delete_user']);
                    if ($error == true) {
                        $error = "La suppression du compte a bien été prise en compte";
                    }
                    // si c'est le cas, on réagit en conséquence
                    wp_redirect(add_query_arg('delete_user', $error, get_home_url()));
                }

                // si c'est le cas, on réagit en conséquence
                return get_template_directory() . '/profil.php';
            } else if (get_query_var('ostella-page') == 'userregister') {

                // si la méthode HTTP (= le verbe de la requête) est POST => on vient de soumettre le formulaire, on doit traiter les données transmises
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $user_id = User::insert_user();

                    // gerer le retour de bonne inscription
                    if (isset($_POST['newsletter'])) {
                        $succes = Database::addMail($_POST['user_email']);
                    }

                    if (is_wp_error($user_id)) {
                        $error = "deja-inscrit";
                    } else {
                        $error = "inscrit";
                    }
                    // si c'est le cas, on réagit en conséquence
                    wp_redirect(add_query_arg('inscription', $error, get_home_url()));
                }

                // si c'est le cas, on réagit en conséquence
                return get_template_directory() . '/inscription.php';
            } else if (get_query_var('ostella-page') == 'userconnect') {

                // si la méthode HTTP (= le verbe de la requête) est POST => on vient de soumettre le formulaire, on doit traiter les données transmises
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $error = User::connect_user();
                    // si c'est le cas, on réagit en conséquence
                    return get_template_directory() . '/connexion.php';
                    exit(); // on empêche le reste du code de s'exécuter, on laisse la redirection se faire tout de suite.
                }
                // si c'est le cas, on réagit en conséquence
                return get_template_directory() . '/connexion.php';
            } else if (get_query_var('ostella-page') == 'ajout-evenement') {

                // si la méthode HTTP (= le verbe de la requête) est POST => on vient de soumettre le formulaire, on doit traiter les données transmises
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //suppression d'un evenement
                    if ($_POST['deletePost-event-ID'] != null) {
                        wp_delete_post($_POST['deletePost-event-ID']);
                        global $error;
                        $error = "L'événement a bien été supprimé";
                        if (wp_get_current_user()->roles[0] == "member") {
                            $error = "Votre événement a bien été supprimé.";
                        }

                        //redirige vers page d'evenement
                        return get_template_directory() . '/home.php';
                        exit();
                    }

                    //edition d'un evenement
                    elseif ($_POST['editPost-event-ID'] != null) {

                        $currentPost = Post::edit_post();

                        update_post_meta(
                            $currentPost,
                            'post_date',
                            $_POST['event-date'],
                        );

                        global $error;
                        $error = "Votre événement a bien été modifié";
                        if (wp_get_current_user()->roles[0] == "member") {
                            $error = "Votre événement a bien été modifié. Il est en attente de publication";
                        }

                        //redirige vers page d'evenement
                        return get_template_directory() . '/home.php';
                        exit();
                    }

                    // publication d'un evenement en tant que moderateur
                    elseif ($_POST['publishPost-event-ID'] != null) {

                        Post::publish_post();

                        global $error;
                        $error = "L'événement a bien été publié";


                        //redirige vers page d'evenement
                        return get_template_directory() . '/home.php';
                        exit();
                    } else {

                        $currentPost = Post::insert_post();

                        // utiliser update_post_meta() pour mettre à jour la méta "date de début"
                        // récupérer le post_id via le ($currentPost).

                        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
                        require_once(ABSPATH . "wp-admin" . '/includes/media.php');

                        $attachment_id = media_handle_upload('thumbnail', $currentPost);

                        if (!is_wp_error($attachment_id)) {
                            set_post_thumbnail($currentPost, $attachment_id);
                        }

                        update_post_meta(
                            $currentPost,
                            'post_date',
                            $_POST['event-date'],
                        );

                        global $error;
                        $error = "Votre événement a bien été publié";
                        if (wp_get_current_user()->roles[0] == "member") {
                            $error = "Votre événement a bien été ajouté. Il est en attente de publication";
                        }

                        //redirige vers page d'evenement
                        return get_template_directory() . '/home.php';
                        exit();
                    }
                }
                global $ostellaCurrentPost;
                $ostellaCurrentPost = get_post($currentPost);

                // si c'est le cas, on réagit en conséquence
                return get_template_directory() . '/ajout-evenement.php';
            } else if (get_query_var('ostella-page') == 'edit-planet') {

                $eventPost = [
                    'ID' => $_POST['editPost-planet-ID'],
                    'post_content' => $_POST['description'],
                    'post_type' => 'planet',
                    'post_status'   => 'publish',
                ];

                // on met à jour le post
                global $currentPost;
                $currentPost = wp_update_post($eventPost);
                $urlPost = get_permalink($currentPost);

                //redirige a la page du post
                wp_redirect($urlPost);
                exit();
            } else if (get_query_var('ostella-page') == 'edit-constel') {

                $eventPost = [
                    'ID' => $_POST['editPost-constel-ID'],
                    'post_content' => $_POST['description'],
                    'post_type' => 'constellation',
                    'post_status'   => 'publish',
                ];

                // on met à jour le post
                global $currentPost;
                $currentPost = wp_update_post($eventPost);
                $urlPost = get_permalink($currentPost);

                //redirige a la page du post
                wp_redirect($urlPost);
                exit();
            } else if (get_query_var('ostella-page') == 'contact') {
                global $error;

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // enregistrer les données de l'utilisateur fournies par $_POST
                    $email      = 'androlus@9online.fr';
                    $subject    = $_POST['subject'];
                    $message    = 'message de :' . $_POST['email'] . '<br><br>' . $_POST['message'];
                    $headers[]  = 'Content-type: text/html';
                    $headers[]   = "Reply-To: <{$_POST['email']}>";
                    $headers[]  = 'Bcc:' . $_POST['email'];

                    $error = wp_mail($email, $subject, $message, $headers);

                    if ($error == false) {
                        $error = "Votre message n'a pas été envoyé";
                    } else {
                        $error = "Votre message a bien été envoyé";
                    }
                }

                // si c'est le cas, on réagit en conséquence
                return get_template_directory() . '/contact.php';
            } else if (get_query_var('ostella-page') == 'userdisconnect') {
                $oStellaCurrentUser = wp_get_current_user();

                clean_user_cache($oStellaCurrentUser->ID);
                wp_clear_auth_cookie();
                add_action('wp_logout',  $oStellaCurrentUser->ID);

                //redirige a la page d'accueil
                wp_redirect(get_home_url());
                exit();
            } else if (get_query_var('ostella-page') == 'newsletter') {
                $oStellaCurrentUser = wp_get_current_user();

                if ($oStellaCurrentUser->ID === 1) {

                    if ($_POST['post_title'] != null) {

                        $newsletter_user_email = Database::getMail();

                        foreach ($newsletter_user_email as $useremail) {
                            // enregistrer les données de l'utilisateur fournies par $_POST
                            $email      = 'androlus@9online.fr';
                            $subject    = $_POST['post_title'];
                            $message    = $_POST['post_content'] . '<br><br>' . $_POST['post_guid'] . '<br><br>  pour vous desinscrire cliquer sur le lien ' . home_url() . '/newsletter/';
                            $headers[]  = 'Bcc:' . $useremail->user_email;
                            $headers[]  = 'Content-type: text/html';
                        }
                        global $error;

                        $error = wp_mail($email, $subject, $message, $headers);

                        // si c'est le cas, on réagit en conséquence
                        wp_redirect(add_query_arg('newsletter', $error, home_url('/newsletter')));

                        exit();
                    }
                    return get_template_directory() . '/newsletter.php';
                    exit;
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                        global $succes;
                        $succes = 0;

                        if ($oStellaCurrentUser->ID != 1) {
                            // permet de se s'inscrire
                            if (isset($_POST['newsletter']) && $_POST['newsletter'] == "inscription") {
                                // on enregistre si le champ n'est pas vide
                                if (!empty($_POST['user_email'])) {
                                    $succes = Database::addMail($_POST['user_email']);
                                }
                            }
                            // permet de se desinscrire
                            if (isset($_POST['newsletter']) && $_POST['newsletter'] == "desinscription") {

                                // on enregistre si le champ n'est pas vide
                                if (!empty($_POST['user_email'])) {
                                    $succes = Database::removeMail($_POST['user_email']);
                                }
                            }
                            // si c'est le cas, on réagit en conséquence
                            return get_template_directory() . '/inscription-newsletter.php';
                            exit;
                        }
                    }

                    return get_template_directory() . '/inscription-newsletter.php';
                }
            } else if (get_query_var('ostella-page') == 'equipe') {
                return get_template_directory() . '/equipe.php';
                exit;
            } else {
                // sinon, on laisse WP faire
                return $template;
            }
        });
    }
}
