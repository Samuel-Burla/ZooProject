<?php
require_once __DIR__ . "../../templates/header.php";


$habitats = getHabitats($pdo);
?>


<section class="section_bigTitle">
    <img src="/assets/images/bigTitleHomeElephant.jpg" alt="Our Zoo">
    <div class="section_bigTitle_content">
        <h1>Découvrir <?= strtolower($menu[$headTitle]["headTitle"]) ?> du Zoo</h1>
    </div>
</section>

<section class="section_gallery">
    <h2>Les differents habitats</h2>
    <div class="section_gallery_content">
        <div class="section_gallery_images">
            <?php foreach ($habitats as $key => $habitat) { ?>
                <div class="section_gallery_images_img">
                    <a href="/pages/habitat.php?id=<?= $habitat["habitat_id"]?>"><!-- image --><img class="gallery_image" src="/assets/images/desert.jpg" alt="desert"></a>
                    <div class="section_gallery_images_img_content">
                        <h2><?= $habitat["habitat_name"] ?></h2>
                    </div>
                </div>
            <?php } ?>
            <!--<img class="gallery_image" src="/assets/images/tropicalForest2.jpg" alt="tropical forest">-->
            <!--<img class="gallery_image" src="/assets/images/savannah.jpg" alt="savannah">-->
            <!--<img class="gallery_image" src="/assets/images/polarZone.jpg" alt="polar zone">-->
            <!--<img class="gallery_image" src="/assets/images/ocean.jpg" alt="ocean">-->
            <!--<img class="gallery_image" src="/assets/images/mountain.jpg" alt="mountain">-->
        </div>
    </div>
</section>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>