<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<div id="page-constel-single-container">
    <main class="page-constel-wrapper">
        <section class="section-constel" id="section-constel-wrapper">
            <div class="section-title">
                <h1 class="title-h1-constel">
                    <?= the_title(); ?>
                </h1>
            </div>
            <div id="section-image-wrapper" class="section-image">
                <div class="constel-form2">
                    <?php $constellations = get_posts([
                        'posts_per_page' => -1,
                        'post_type' => 'constellation'
                    ])
                    ?>
                    <select id="form-optgroup2" class="form-optgroup" name="constellations" onchange="document.location.href=this.value">
                        <option value=""> -- Choisir une constellation --
                        </option>
                        <?php foreach ($constellations as $constellation) : ?>
                            <option value="<?= get_permalink($constellation->ID) ?>">
                                <?= $constellation->post_title; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php while (have_posts()) : the_post(); ?>
                    <div class="picture-constel">
                        <div class="constel-img">

                            <?php the_post_thumbnail('medium_large', ['class' => 'constel-img-responsive']); ?>

                        </div>
                    </div>
                    <div class="image-description" id="image-wrapper">
                        <div class="constel-form1">
                            <?php $constellations = get_posts([
                                'posts_per_page' => -1,
                                'post_type' => 'constellation'
                            ])
                            ?>
                            <select id="form-optgroup" class="form-optgroup" name="constellations" onchange="document.location.href=this.value">
                                <option value=""> --Choisir une constellation--
                                </option>
                                <?php foreach ($constellations as $constellation) : ?>
                                    <option value="<?= get_permalink($constellation->ID) ?>">
                                        <?= $constellation->post_title; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?php if ((is_user_logged_in()) && ($current_user->roles[0] == "administrator")) { ?>
                            <div class="constel-description-admin">
                                <form action="<?= get_home_url(); ?>/edit-constel" method="post">
                                    <textarea id="textarea-single" placeholder="Description de l'événement" name="description"><?= do_shortcode(get_the_content()); ?></textarea>
                                    <button name="editPost-constel-ID" value="<?= $post->ID ?>" type="submit">Enregistrer les modifications</button>
                                </form>
                            </div>

                        <?php } else { ?>
                            <div class="constel-description">
                                <?= do_shortcode(get_the_content()); ?>
                            </div>
                        <?php } ?>

                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>

        </section>
    </main>
</div>
<div class="section-comments">
    <div class="comments-container">
        <div id="commentaires">
            <?php comments_template(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>