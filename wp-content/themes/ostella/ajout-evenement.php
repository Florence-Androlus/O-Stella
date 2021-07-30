<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main class="main-container-addevent">
    <h2 class="event-title-confirm"><?= $error ?></h2>
    <h1 class="event-title">Nouvel événement</h1>
    <div class="central-container-addevent">
        <form class="form-addevent" action="" method="POST" id="form-test-add-event" enctype="multipart/form-data">
            <div id="central-addevent">
                <div class="left-addevent">
                    <div><input type="text" name="event-title" placeholder="Titre de l'événement" id="event-title" required><span id="icon-control6"></span></div>
                    <div><input type="date" name="event-date" placeholder="Date de l'événement" id="event-date" required><span id="icon-control7"></span></div>
                    <div class="form-error-wrapper1">
                        <span id="form-error-add-event1" hidden></span>
                    </div>
                </div>
                <div class="right-addevent" id="event-img">
                    <label for="picture">Ajouter une image :</label>
                    <input class="upload" type="file" name="thumbnail">
                </div>
                <div id="bot-event">
                    <textarea id="textarea-single" placeholder="Description de l'événement" name="description" required></textarea>
                    <div class="form-error-wrapper2">
                        <span id="form-error-add-event2" hidden></span><span id="icon-control10"></span>
                    </div>
                    <section class="event-category">
                        <select class="select-event-category" name="taxo-event" id="event-select" onchange="this.form.addEventPostByCategory()">
                            <?php $categoryEvent = get_terms(['taxonomy' => 'event', 'hide_empty' => false]); ?>
                            <option value="">Choisissez un type d'événement</option>
                            <?php foreach ($categoryEvent as $categoryEvent) :  ?>
                                <option value="<?= $categoryEvent->term_id; ?>"><?= $categoryEvent->name ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="icon-control11"></span>

                    </section>
                    <button type="submit">Confirmer</button>
                </div>
        </form>
        <p id="thanks-event" hidden>Votre événement a bien été jouté, il est en attente de validation. Merci!</p>
    </div>
</main>
<?php get_footer(); ?>