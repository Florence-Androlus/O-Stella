<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main class="main-container-register">
    <h1 class="register-title">Inscription</h1>
    <div class="central-container-register">
        <form action="" method="POST" id="form-test-inscription">
            <div id="central">
                <div class="left">

                    <div>
                        <input type="email" name="user_email" placeholder="E-mail" id="user_email" required><span id="icon-control1"></span>
                    </div>
                    <div>
                        <input type="text" name="user_firstname" placeholder="Prénom" id="user_firstname" required><span id="icon-control2"></span>
                    </div>
                    <div>
                        <input type="text" name="user_lastname" placeholder="Nom" id="user_lastname" required><span id="icon-control3"></span>
                    </div>
                    <div>
                        <input type="text" name="user_login" placeholder="Pseudo" id="user_login" required><span id="icon-control4"></span>
                    </div>
                    <div>
                        <input type="password" name="user_password" placeholder="Mot de passe" id="user_password" required><span id="icon-control5"></span>
                    </div>
                    <!--<input type="password" name="user_password" placeholder="Confirmation du mot de passe">-->
                    <div>
                        <span id="form-error-inscription" hidden></span>
                    </div>
                </div>
            </div>

            <div id="bot-register">
                <div id="newsletter-checkbox">
                    <input type="checkbox" id="inscription" name="newsletter" value="inscription">
                    <label for="inscription">Inscription à la newsletter</label>
                </div>
                <div id='recaptcha' class="g-recaptcha"
                    data-sitekey="6LcrHAkdAAAAALo2hg6T6Q0W3gV9dbGRsAfK_mnp"
                    data-callback="onSubmit"
                    data-size="invisible">
                </div>
                <button type="submit" id="buttonSubmit">Confirmer</button>
            </div>
        </form>
        <p id="thanks-inscription" hidden>Votre saisie a bien été prise en compte. Merci!</p>
    </div>
</main>
<?php get_footer(); ?>