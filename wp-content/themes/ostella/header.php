<!DOCTYPE html>
<html lang="fr">

<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'Stella</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body <?php body_class(); ?>>
    <?php if (is_front_page()) : ?>
        <div class="site-wrapper">
        <?php endif; ?>
        <header id="header-desktop">
            <div id="header-top">
                <a id="logo" href="<?= get_home_url(); ?>"></a>

                <!-- apparition du logo en format mobile -->


                <!--apparition du user connecté -->
                <?php $current_user = wp_get_current_user();
                if ($current_user->ID != 0) { ?>
                    <a class="user-header" href="<?= get_home_url(); ?>/profil">
                        <span class="circle"><i class="fas fa-user-astronaut"></i></span> <?= $current_user->user_nicename; ?>
                    </a>
                <?php
                }
                // 
                ?>
            </div>
            <nav class="header-navbar">
                <?php if ($current_user->ID != 0) { ?>
                    <a href="<?= get_home_url(); ?>/userdisconnect">Déconnexion</a>

                <?php } else {
                ?>
                    <a href="<?= get_home_url(); ?>/userconnect">Connexion</a>

                    <a href="<?= get_home_url(); ?>/userregister">Inscription</a>
                <?php } ?>
                <a href="<?= get_home_url(); ?>/planetes">Planètes</a>
                <a href="<?= get_home_url(); ?>/constellations">Constellations</a>
                <a href="<?= get_home_url(); ?>/evenements">Evénements</a>
            </nav>
            <nav role="navigation">
                <div id="menuToggle">
                    <!--
          A fake / hidden checkbox is used as click reciever,
          so you can use the :checked selector on it.
          -->
                    <input type="checkbox" />

                    <!--
              icon burger-menu 
          -->
                    <span></span>
                    <span></span>
                    <span></span>


                    <ul id="menu">
                        <?php if ($current_user->ID != 0) { ?>
                            <a href="<?= get_home_url(); ?>/userdisconnect">
                                <li>Déconnexion
                                <li>
                            </a>
                        <?php } else {
                        ?>
                            <a href="<?= get_home_url(); ?>/userconnect">
                                <li>Connexion
                                <li>
                            </a>
                            <a href="<?= get_home_url(); ?>/userregister">
                                <li>Inscription
                                <li>
                            </a>
                        <?php } ?>
                        <a href="<?= get_home_url(); ?>/planetes">
                            <li>Planètes</li>
                        </a>
                        <a href="<?= get_home_url(); ?>/constellations">
                            <li>Constellations</li>
                        </a>
                        <a href="<?= get_home_url(); ?>/evenements">
                            <li>Evénements</li>
                        </a>

                    </ul>
                </div>
            </nav>
        </header>