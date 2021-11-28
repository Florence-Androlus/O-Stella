<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>

<main class="main-container-eventlist">
<h2 class="event-title-confirm"><?= $error ?></h2>
  <h1 class="title-eventlist">Evènements</h1>
  <nav id="eventlist">
  <section class="select-constel">
    <?php $event = get_terms(['taxonomy' => 'event', 'hide_empty' => false]);?>
      <form method="GET" action="<?= home_url('/evenements')?>"> 
        <select class="select-event" name="event" id="event-select" action="" onchange="this.form.submit()">
          <option value="">--Choisir un évènement--</option>
            <?php foreach ($event as $event) :  ?>
            <option value="<?= $event->term_id; ?>">
              <?= $event->name ?>
            </option>
          <?php endforeach;?>
        </select>
      </form>

      </section>
    <?php  
      $current_user = wp_get_current_user(); 
      $frontPagePost=getFrontPagePosts(); 
      $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

      while ($frontPagePost->have_posts()) : $frontPagePost->the_post(); 
       if ( is_user_logged_in() && get_post()->post_status == "draft" && $current_user->display_name == get_the_author() || $current_user->roles[0] =="moderator" || $current_user->roles[0] =="administrator") : ?>

      <a class="event-link" href="<?= the_permalink();?>">
        <?= the_title();       ?>  
      <?php  elseif(get_post()->post_status != "draft" ) :?>
          <a class="event-link" href="<?= the_permalink();?>">
          <?= the_title();  ?>
        
      <?php endif; 
      if ($current_user->roles[0] !="member" && $current_user->ID != 0) 
        {
          echo '('.get_post()->post_status.')'; 
        }  ?>
                   </a>
      <?php  endwhile;
    
     if($frontPagePost->max_num_pages>1):  ?>
    <section class="pagination">
    <?php 
    if($current_page>1):?>
      <button id="button-single-event"> <?php previous_posts_link( 'Evénement précédent'); ?></button>
      <?php endif;
      if($frontPagePost->max_num_pages>$current_page):  ?>
      <button id="button-single-event"><?php next_posts_link( 'Evénement Suivant', $frontPagePost->max_num_pages ); ?></button>
      <?php endif;?>
    </section>
    <?php endif;?> 

    <?php if ($current_user->ID != 0) { ?>
      <a href="<?= get_home_url(); ?>/ajout-evenement"><button id="button-addevent">Ajouter un évènement</button></a>
    <?php } 
    wp_reset_postdata();
    ?>

  </nav>
  
</main>
<?php get_footer(); ?>