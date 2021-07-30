<?php get_header(); ?>
<canvas id="bgCanvas"></canvas>
<main class="main-container-constel">
  <h1 class="title-constel"><?= the_title() ?></h1>
  <section class="select-constel">
    <?php //$constellations = get_terms(['taxonomy' => 'constellation']);  
    $constellations = get_posts([
      'posts_per_page' => -1,
      'post_type' => 'constellation'
    ])
    ?>
    <div class="planet-form1">

      <select class="select-etoile" name="constellation" id="constellation-select" onchange="document.location.href=this.value">
        <option value="">-- Choisir une constellation --</option>
        <?php foreach ($constellations as $constellation) : ?>
          <option value="<?= get_permalink($constellation->ID)?>">
             <?= $constellation->post_title; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <form class="form-map" method="post">
      <select class="select-map" name="map" id="map-select" onchange="setIframeSource()">
        <option value="">-- Choisir une carte du ciel --</option>
        <option value="https://virtualsky.lco.global/embed/index.html?longitude=-119.86286000000001&latitude=34.4326&projection=gnomic&constellations=true&constellationlabels=true&live=true&az=47.25">Gnomic</option>
        <option value="https://virtualsky.lco.global/embed/index.html?longitude=-119.86286000000001&latitude=34.4326&projection=planechart&constellations=true&constellationlabels=true&live=true&az=47.25" width="1000" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowTransparency="true">Planechart</option>
        <option value="https://virtualsky.lco.global/embed/index.html?longitude=-119.86286000000001&latitude=34.4326&projection=polar&constellations=true&constellationlabels=true&live=true&az=60">Polar</option>
        <option value="https://virtualsky.lco.global/embed/index.html?longitude=-119.86286000000001&latitude=34.4326&projection=mollweide&constellations=true&constellationlabels=true&live=true&az=114.25">MollWeide</option>
      </select>
    </form>
  </section>
  <section class="map">
    <iframe width="700" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://virtualsky.lco.global/embed/index.html?longitude=-119.86286000000001&latitude=34.4326&projection=gnomic&constellations=true&constellationlabels=true&live=true&az=47.25" allowTransparency="true" id="Iframe-maps"></iframe>
  </section>

</main>
<?php get_footer(); ?>