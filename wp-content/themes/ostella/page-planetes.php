<?php

get_header(); ?>
<canvas id="bgCanvas"></canvas>
<div id="page-planet-container">
    <main class="main-planet-wrapper">
        <section class="section-planet" id="section-planet-wrapper">
            <?php $planets = get_posts([
                'posts_per_page' => -1,
                'post_type' => 'planet'
            ])
            ?>
            <div class="planet-form1">
                <select id="form-optgroup" class="form-optgroup" name="planetes" onchange="document.location.href=this.value">
                    <option value=""> -Choisir une planète-</option>
                    <?php foreach ($planets as $planet) : ?>
                        <option value="<?= get_permalink($planet->ID) ?>">
                            <?= $planet->post_title; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="nasa-image">
                <?php
                $url = 'https://api.nasa.gov/planetary/apod?api_key=a4A5mpX2oQG5M6grSVyIgFgbMZJu9QI1Idp7W8tZ';

                $request = wp_remote_get($url);

                if (is_wp_error($request)) {
                    return false; // Si il y a une erreur, on s'arrête là
                } else {
                    $body = wp_remote_retrieve_body($request);

                    $data = json_decode($body, true);

                    $title = $data['title'];
                    $date = $data['date'];
                    //url d'image
                    $hdurl = $data['hdurl'];
                    // url de video youtube
                    $url = $data['url'];

                    if ($hdurl == null) {
                ?>

                        <iframe src="<?= $url ?>" width="100%" height="100%" frameborder="0" allow="fullscreen" class="nasa-img-day"></iframe>
                    <?php } else { ?>
                        <img id="pic" class="nasa-img-day" src="<?= $hdurl ?>" alt="NASA Picture Of The Day">
                <?php
                    }
                }
                ?>
            </div>

            <div class="section-title">
                <h1 class="title-h1-planet">NASA Astronomy Picture Of The Day</h1>
            </div>

            <div class="nasa-title">
                <h2 id="title"><?= $title ?></h2>
                <h3>Date: <span id="date"><?= $date ?></span></h3>
                <br>
                <p id="explanation"><?= $explanation ?></p>
            </div>

        </section>
    </main>
</div>
<?php get_footer(); ?>