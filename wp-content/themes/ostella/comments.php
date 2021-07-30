<?php
$count = absint(get_comments_number());
?>

<?php if ($count > 0) : ?>
    <h2><?= $count ?> Commentaires<?php $count > 1 ? 's' : '' ?></h2>
    <h2 id="title-scroll"><a class="style-comments" href="#comments-scroll">Voir les commentaires</a></h2>

    <?php if (!is_user_logged_in()) : ?>
        <h3><a href="<?= get_home_url(); ?>/userconnect">Connectez-vous</a> pour participer</h3>
    <?php endif; ?>
<?php else : ?>
    <h2>Laisser un premier commentaire</h2>
<?php endif ?>
<div id="comments-scroll" class="scroll">
    <?php wp_list_comments() ?>
    <div class="hide">
        <a href="#title-scroll" class="hide-comments">Masquer les commentaires</a>
    </div>
</div>

<?php if (comments_open()) : ?>
    <?php if (is_user_logged_in()) { ?>
        <?php comment_form(['title_reply' => '']) ?>
    <?php } ?>
<?php endif ?>