<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main id="newsletter">
  <div id="top-newsletter">

    <h1 class="newsletter-title-admin">Newsletter</h1>
    <?php if($_GET['newsletter']==true )
            {
        ?>
        <h1 class="newsletter-title-admin">La newsletter a bien été envoyée </h1>
    <?php 
          } ?>
  </div>
  <?php
  $evenements = get_posts([
    'posts_per_page' => -1,
    'post_type' => 'event'
  ]);
  ?>
  <form class="form-newsletter" action="<?= home_url('/newsletter')?>" name="newsletter" method="POST">
    <select class="select-news" name="newsletter" id="newsletter-select" onchange="this.form.submit()">
      <option class="option-newsletter" value="Create_newsletter">Créer votre newsletter </option>
      <?php foreach ($evenements as $evenement) : ?>
        <option name="newsletter-ID" value="<?= $evenement->ID ?>">
          <?= $evenement->post_title; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </form>

  <div class="event-link">
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['newsletter'] != "Create_newsletter") {
      $post_ID = $_POST['newsletter'];
      $post = get_post($post_ID);

    ?>
      <form action="" method="POST">
        <div class="post-newsletter">
          <?= $post->post_title; ?><br />
        </div>
        <div class="post-newsletter-content">
          <?= $post->post_content; ?>
        </div>
        <input type="hidden" name="post_title" value="<?= $post->post_title ?>">
        <div>
          <input type="hidden" name="post_content" value="<?= $post->post_content ?>">
          <input type="hidden" name="post_guid" value="<?= $post->guid ?>">

        <?php } else {
        echo 'Créer votre propre newsletter ou choisissez un événement dans la liste <br><br>'; ?>
          <form action="" method="POST">
            <div class="post-newsletter">
              <label> Sujet de votre newsletter</label>
              <input class="title-admin" type="text" name="post_title" value="">
            </div>
            <div class="post-newsletter">
              <label> Contenu de votre newsletter </label>
              <textarea class="textarea-admin" name="post_content" value=""></textarea>
              <input type="hidden" name="post_guid" value="<?=get_home_url();?>">
            </div>
          <?php  } ?>
          <button class="newsletter-button-admin" type="submit" id="buttonSubmit">Envoi de Newsletter</button>
        </div>
  </div>
  </form>
</main>
<?php get_footer(); ?>