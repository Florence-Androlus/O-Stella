<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main class="main-container-author">
    <?php $oStellaUserPost = get_queried_object();
    //liste des posts fait par l'utilisateur
    $args = [
        'post_type' => 'event',
        'post_status' => 'publish',
        'author_name' => $oStellaUserPost->user_nicename
    ];
    $frontPagePost = new WP_Query($args);
    ?>

    <h1 class="author-title">Profil de <?= $oStellaUserPost->user_nicename; ?></h1>
    <div class="central-container-author">
        <div id="central-author">
            <div class="left-author">
                <div id=bot-author>
                    <h2>Ma description</h2>
                    <textarea class="text-author" placeholder="Votre description" name="description" disabled><?= $oStellaUserPost->description; ?></textarea>
                </div>
            </div>
            <div class="post-author">
                <h2 class="title-h2">Mes articles</h2>
                <?php get_posts(array('author' => 1));
                while ($frontPagePost->have_posts()) : $frontPagePost->the_post(); ?>
                    <a class="event-link2" href="<?= the_permalink(); ?>">
                        <?= the_title(); ?>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        $current_user = wp_get_current_user();
        if ($current_user->roles[0]  == "administrator") : ?>
            <button class="button-profil-author" name="delete_user" value="<?= $current_user->ID; ?>" type="submit">Suppression du compte</button>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>