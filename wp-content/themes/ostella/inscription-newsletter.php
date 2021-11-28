<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main id="newsletter">
    <div id="top-newsletter">
        <h1 class="newsletter-visiteur"><span class="newsletter-far"><i class="fas fa-user-astronaut"></i></span>Newsletter<span class="newsletter-far"><i class="far fa-paper-plane"></i></h1>
    </div>
    <form class="form-newsletter" action="" method="post">
        <?php if ($succes === 0) : ?>
            <div id="top-newsletter">
                <h1 class="title-newsletter">Veuillez saisir une adresse mail</h1>
            </div>
        <?php elseif ($succes === 1) : ?>
            <div id="top-newsletter">
                <h1>Cette adresse mail reçoit déjà la Newsletter</h1>
            </div>
        <?php elseif ($succes === true && $_POST['newsletter'] == 'inscription') : ?>
            <div id="top-newsletter">
                <h1>Votre Enregistrement a bien été pris en compte</h1>
            </div>
        <?php elseif ($succes === true && $_POST['newsletter'] = 'desinscription') : ?>
            <div id="top-newsletter">
                <h1>Vous avez bien été désinscrit de la Newsletter</h1>
            </div>
        <?php endif; ?>
        <div><label for="email">E-mail :</label> <input type="email" id="email" name="user_email" value="" /></div>
        <div class="radio">
            <input type="radio" id="inscription" name="newsletter" value="inscription">
            <label for="inscription">Inscription</label>
        </div>
        <div class="radio">
            <input type="radio" id="desinscription" name="newsletter" value="desinscription">
            <label for="desinscription">Désinscription</label>
        </div>
        <div id='recaptcha' class="g-recaptcha"
            data-sitekey="6LcrHAkdAAAAALo2hg6T6Q0W3gV9dbGRsAfK_mnp"
            data-callback="onSubmit"
            data-size="invisible">
        </div>
        <div><button id="button-newsletter-valider" type="submit">Valider</button> </div>
    </form>
</main>
<?php get_footer(); ?>