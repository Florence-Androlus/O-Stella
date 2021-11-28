<?php
/*
 * Template Name: Contact
 * description: >-
*Page template contact
 */

get_header(); ?>

<canvas id="bgCanvas"></canvas>
<main class="page-contact-container">
  <h1>Nous contacter</h1>
  <h1><?= $error ?></h1>
  <form class="form-contact form-background" id="contact" action="" method="post">
    <div class="half left form-contact">
      <input type="email" id="email" name="email" placeholder=" Email" required autofocus>
      <input type="text" id="subject" name="subject" placeholder=" Objet">
    </div>
    <div class="half right form-contact">
      <textarea type="text" id="message" name="message" placeholder=" Mon message..." rows="6" maxlength="3000" required></textarea>
    </div>
    <div id='recaptcha' class="g-recaptcha"
        data-sitekey="6LcrHAkdAAAAALo2hg6T6Q0W3gV9dbGRsAfK_mnp"
        data-callback="onSubmit"
        data-size="invisible">
    </div>
    <input type="submit" value="Envoyer" class="form-submit">
  </form>
</main>
<?php get_footer(); ?>