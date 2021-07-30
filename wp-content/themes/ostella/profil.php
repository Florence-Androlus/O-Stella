<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
    <main class="main-container-profil">        
        <?php   $current_user = wp_get_current_user(); 
           
            //liste des posts fait par l'utilisateur
            $args = [ 
                'post_type' => 'event',
                'post_status' => 'publish',
                'author_name' => $current_user->user_nicename 
            ];
            $frontPagePost = new WP_Query($args);

        ?>
    <h1 class="login-title"><?= $error ?></h1>
    <h1 class="profil-title">Mon profil</h1>
    <div class="central-container-profil">
        <form class="form-profil" action="" method="POST">
            <div id="central-profil">
                <div class="left-profil">
                    <input class="input-profil" type="text" name="user_firstname" placeholder="Prénom" value="<?= $current_user->user_firstname; ?>">
                    <input class="input-profil" type="text" name="user_lastname" placeholder="Nom" value="<?= $current_user->user_lastname; ?>">
                    <input class="input-profil" type="text" name="user_nicename" placeholder="Pseudo" value="<?= $current_user->user_nicename; ?>">
                    <input class="input-profil" type="email" name="user_email" placeholder="E-mail" value="<?= $current_user->user_email; ?>">

                    <div id=bot-profil>
                        <textarea class="text-profil" placeholder="Votre description" name="description"><?= $current_user->description; ?></textarea>
                      <?php  if ($current_user->roles[0] !="administrator") :?>
                        <button class="button-profil" name="delete_user" value="<?= $current_user->ID; ?>" type="submit">Suppression du compte</button>
                        <?php endif;?>
                        <button class="button-profil" name="update_user" type="submit">Mise à jour</button>
                    </div>
                </div>
                <div class="post-profil">
                    <h2>Mes articles</h2>
                    <?php while ($frontPagePost->have_posts()) : $frontPagePost->the_post(); ?>
                        <a class="event-link1" href="<?= the_permalink(); ?>">
                            <?= the_title(); ?>
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </form>
    </div>

</main>
<?php get_footer(); ?>