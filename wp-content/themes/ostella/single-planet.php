<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<div id="page-planet-single-container">
    <main class="page-planet-wrapper">
        <section class="section-planet" id="section-planet-wrapper">
            <div class="section-title">
                <h1 class="title-h1-planet">
                    <?= the_title(); ?>
                </h1>
            </div>
            <div id="section-image-wrapper" class="section-image">
                <div class="planet-form2">

                    <?php $planets = get_posts([
                        'posts_per_page' => -1,
                        'post_type' => 'planet'
                    ])
                    ?>
                    <select id="form-optgroup2" class="form-optgroup" name="planetes" onchange="document.location.href=this.value">
                        <option value=""> ------ Choisir une planète ------
                        </option>
                        <?php foreach ($planets as $planet) : ?>
                            <option value="<?= get_permalink($planet->ID) ?>">
                                <?= $planet->post_title; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php while (have_posts()) : the_post(); ?>

                    <div class="picture-planet">
                        <div class="planet-img">
                            <?php the_post_thumbnail('medium_large', ['class' => 'planet-img-responsive']); ?>
                        </div>
                    </div>
                    <div class="image-description" id="image-wrapper">
                        <div class="planet-form1">
                            <?php $planets = get_posts([
                                'posts_per_page' => -1,
                                'post_type' => 'planet'
                            ])
                            ?>
                            <select id="form-optgroup" class="form-optgroup" name="planetes" onchange="document.location.href=this.value">
                                <option value=""> ------Choisir une planète------
                                </option>
                                <?php foreach ($planets as $planet) : ?>
                                    <option value="<?= get_permalink($planet->ID) ?>">
                                        <?= $planet->post_title; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <?php if ((is_user_logged_in()) && ($current_user->roles[0] == "administrator")) { ?>
                            <div class="planet-description-admin">
                                <form action="<?= get_home_url(); ?>/edit-planet" method="post">
                                    <textarea id="textarea-single" placeholder="Description de l'événement" name="description"><?= do_shortcode(get_the_content()); ?></textarea>
                                    <button name="editPost-planet-ID" value="<?= $post->ID ?>" type="submit">Enregistrer les modifications</button>
                                </form>
                            </div>

                        <?php } else { ?>
                            <div class="planet-description">
                                <?= do_shortcode(get_the_content()); ?>
                            </div>
                        <?php } ?>

                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
            <div class="section-comments">
                <div class="comments-container">
                    <div id="commentaires">
                        <?php comments_template(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>