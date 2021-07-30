<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<?php while (have_posts()) : the_post();  ?>
    <main class="main-container-single-event">
        <h1 class="event-title"><?php the_title(); ?></h1>
        <div class="central-container-single-event">
            <form class="form-single-event" action="<?= get_home_url(); ?>/ajout-evenement" method="POST">
                <?php $current_user = wp_get_current_user();
                // si membre connecté
                if (is_user_logged_in() && get_post()->post_status == "draft" && $current_user->display_name == get_the_author()) : ?>
                    <div id="central">
                        <div class="right" id="event-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="left">
                        <p class="info-post"><strong>Titre</strong> :</p>
                            <input type="text" name="event-title" value="<?php the_title(); ?>"> 
                            <p class="info-post"><strong>Date de l'évènement</strong> : <?= date('d-m-Y', strtotime(get_post_meta(get_the_ID())['post_date'][0])); ?></p>
                            <input type="date" name="event-date" value="">

                        </div>
                    </div>
                    <div id="bot-single">
                        <textarea id="textarea-single" placeholder="Description de l'événement" name="description"><?= do_shortcode(get_the_content()); ?></textarea>
                    <?php else : ?>
                        <div id="central">
                            <div class="right" id="event-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="left">
                            <p class="info-post"><strong>Titre</strong> : <?php the_title(); ?></p>
                            <p class="info-post"><strong>Publié le</strong> : <?php the_date(); ?></p>
                            <p class="info-post"><strong>Date de l'évènement</strong> : <?= date('d-m-Y', strtotime(get_post_meta(get_the_ID())['post_date'][0])); ?></p>
                            <p class="info-post"><strong>Auteur</strong> : <?php the_author_posts_link(); ?></p>

                        </div>
                    </div>
                    <div id="bot-single">
                        <div class="single-style"><?= do_shortcode(get_the_content()); ?></div>
                    <?php endif; ?>
                    <?php $current_user = wp_get_current_user();
                    // si membre connecté
                    if (is_user_logged_in() && ($current_user->display_name == get_the_author() || ($current_user->roles[0] == "moderator" || $current_user->roles[0] == "administrator"))) : ?>
                        <section class="event-category">
                            <select class="select-event-category" name="taxo-event" id="event-select">
                                <?php $categoryEvent = get_terms(['taxonomy' => 'event', 'hide_empty' => false]); ?>
                                <option value="<?=get_the_terms($post->ID, 'event')[0]->term_id?>"><?= get_the_terms($post->ID, 'event')[0]->name ?></option>
                                <?php foreach ($categoryEvent as $categoryEvent) :  ?>
                                    <option value="<?= $categoryEvent->term_id; ?>"><?= $categoryEvent->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </section>
                        <div class="if-author">
                            <?php if (get_post()->post_status == "draft" && $current_user->roles[0] != "member") : ?>
                                <button name="publishPost-event-ID" value="<?= $post->ID ?>" type="submit">Publication de l'événement</button>
                            <?php elseif ($current_user->display_name == get_the_author() && get_post()->post_status == "draft") : ?>
                                <button name="editPost-event-ID" value="<?= $post->ID ?>" type="submit">Enregistrer les modifications</button>
                            <?php endif; ?>
                            <button name="deletePost-event-ID" value="<?= $post->ID ?>" type="submit">Supprimer</button>
                        </div>
                    <?php endif; ?>
                    </div>
            </form>
            <?php if (is_single()) : ?>
                <section class="pagination">
                    <?php   // On récupère les posts précédents et suivants
                    // => des instances de WP_Post
                    $nextPost = get_next_post();
                    $previousPost = get_previous_post();
                    ?>
                    <a class="pagination--previous-link button" href="<?= get_permalink($nextPost); ?>"><button id="button-single-event">Article précédent</button></a>
                    <a class="pagination--next-link button" href="<?= get_permalink($previousPost); ?>"><button id="button-single-event">Article suivant</button></a>
                </section>
            <?php endif ?>
        </div>
    </main>
    <div class="section-comments">
        <div class="comments-container">
            <div id="commentaires">
                <?php comments_template(); ?>
            </div>
        </div>
    </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>