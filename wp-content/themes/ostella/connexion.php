<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main class="main-container-login">
    <section class="login-container">
        <h1 class="login-title">Connexion</h1>
        <h2 class="login-title-error"><?= $error ?></h2>
        <div class="central-container-login">
            <form class="form" action="" method="POST" id="form-test-connexion">
                <div class="inputs">
                    <label>
                        <div class="champ-login">
                            <input class="icon" type="text" name="user_login" placeholder="Pseudo" id="connexion_login" required>
                            <span id="icon-control8"></span>
                        </div>
                        <div class="champ-login">
                            <input class="icon" type="password" name="user_password" placeholder="Mot de passe" id="connexion_password" required>
                            <span id="icon-control9"></span>
                            <div class="password-icon">
                                <i data-feather="eye"></i>
                                <i data-feather="eye-off"></i>
                            </div>
                        </div>
                    </label>
                    <script src="https://unpkg.com/feather-icons"></script>
                    <script>
                        feather.replace();
                    </script>
                </div>
                <div id="form-error-connexion-wrapper">
                    <span id="form-error-connexion" hidden></span>
                </div>
                <!--<div class="g-recaptcha" data-sitekey="6LehMFEaAAAAAOjv_RPp5e0ivi--shuxQG4KuClY" data-theme="dark"></div>-->
                <br />
                <div id="bot-login">
                <div id='recaptcha' class="g-recaptcha"
                    data-sitekey="6LcrHAkdAAAAALo2hg6T6Q0W3gV9dbGRsAfK_mnp"
                    data-callback="onSubmit"
                    data-size="invisible">
                </div>
                    <button type="submit" id="button-login">Valider</button>
                    <!--<a href="">Mot de passe oublié ?</a> -->
                </div>
            </form>
            <p id="thanks-connexion" hidden>Votre saisie a bien été prise en compte. Merci!</p>
        </div>
    </section>
</main>
<?php get_footer(); ?>