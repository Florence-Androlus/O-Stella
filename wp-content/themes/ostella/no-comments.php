<!-- Si on renomme la page "comments.php" elle sera prise en compte et donc on aura plus les commentaires par defaut -->
<?php
if (have_comments()) {
?>
    <section class='post-comments'>

        <?php
        $comments = get_comments();
        foreach ($comments as $comm) {
        ?>
            <!-- TODO  a mettre en forme -->
            <div class='post-each-comment'>
                <p class="post-each-comment-meta">
                    <?= $comm->comment_author; ?>
                    <?php comment_time(); ?>
                </p>
                <?= $comm->comment_content;   ?>
            </div>
        <?php
        }
        ?>
    </section>
<?php
} // end of have_comments()
else // S'il n'y a pas de commentaires
{
?>
    <p class="comments__none">
        Il n y a pas de commentaires pour le moment. Soyez le premier à participer !
    </p>
<?php
} ?>
</div>
<?php
comment_form(); // Le formulaire d'ajout de commentaire
?>
