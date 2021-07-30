<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main class="equipe">
  <h1>Qui sommes-nous ?</h1>
  <div class="member-equipe-container">
    <div class="member-left">
      <div>
        <img class="img" src="<?php echo get_stylesheet_directory_uri() . '/assets/scss/images/avatars/aurelie.png' ?>" alt="" />
        <p>Aurélie - Product Owner</p>
      </div>
      <div class="row1">
        <img class="img" src="<?php echo get_stylesheet_directory_uri() . '/assets/scss/images/avatars/florence.png' ?>" alt="" />
        <p>Florence - Scrum Master</p>
      </div>
    </div>
    <div class="member-right">
      <div>
        <img class="img" src="<?php echo get_stylesheet_directory_uri() . '/assets/scss/images/avatars/jean.png' ?>" alt="" />
        <p>Jean - Lead Front</p>
      </div>
      <div>
        <img class="img" src="<?php echo get_stylesheet_directory_uri() . '/assets/scss/images/avatars/sylvie.png' ?>" alt="" />
        <p>Sylvie - Git Master</p>
      </div>
      <div>
        <img class="img" src="<?php echo get_stylesheet_directory_uri() . '/assets/scss/images/avatars/aymeric.png' ?>" alt="" />
        <p>Aymeric - Lead Back</p>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>