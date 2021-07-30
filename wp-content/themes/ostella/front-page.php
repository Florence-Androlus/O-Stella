<?php get_header(); ?>

<main class="body-container">
  <div class="description">

    <?php $current_user = wp_get_current_user();

    $user_id = $_GET['inscription'];
    if (!is_user_logged_in()) {
      // message suivant si l'inscription à ete prise en compte
      if (($user_id) == "inscrit") { ?>
        <h2>Votre inscription a bien été prise en compte</h2>
      <?php  } elseif (($user_id) == "deja-inscrit") { ?>
        <h2>Vous êtes déjà inscrit.</h2>
      <?php  }
    }

    if ($_GET['delete_user'] == true) { ?>
      <h2>La suppression de votre compte a bien été validée</h2>
    <?php } ?>

    <h1>Bienvenue </h1>

    <p>O'Stella est un site dédié aux amateurs comme aux expérimentés ainsi qu'à tous les amoureux de notre galaxie !
      Evènements futurs, évènements passés seront au rendez-vous.
      <p> Découvrez nos magnifiques planètes, nos constellations et plus encore !</p>
      Venez explorer chez O'Stella !
    </p>
  </div>

  <div class="solar-syst">
    <div class="sun"></div>
    <div class="mercury"></div>
    <div class="venus"></div>
    <div class="earth"></div>
    <div class="mars"></div>
    <div class="jupiter"></div>
    <div class="saturn"></div>
    <div class="uranus"></div>
    <div class="neptune"></div>
    <div class="pluto"></div>
    <div class="asteroids-belt"></div>
  </div>
</main>

<?php get_footer(); ?>