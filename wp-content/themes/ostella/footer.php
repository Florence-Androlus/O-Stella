<footer>
    <nav class="footer-navbar">
        <a href="<?= get_home_url(); ?>/newsletter">Newsletter</a>
        <a href="<?= get_home_url(); ?>/contact">Contact</a>
        <a href="<?= get_home_url(); ?>/mentions-legales">Mentions légales</a>
        <a href="<?= get_home_url(); ?>/equipe">Qui sommes-nous?</a>
    </nav>
</footer>
<?php wp_footer(); ?>

<?php if(is_front_page()) : ?>
    </div>
<?php endif; ?>

</body>

</html>