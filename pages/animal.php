<?php
require_once __DIR__ . "../../templates/header.php";

$animal_id = $_GET["id"];
$animal = getAnimal($pdo, $animal_id);
$veterinarianOpinion = getVeterinarianOpinion($pdo, $animal_id);
$date = date("d M Y",$veterinarianOpinion["date"]);
?>

<section class="section_bigTitle">
    <img src="/assets/images/bigTitleHomeElephant.jpg" alt="Our Zoo">
    <div class="section_bigTitle_content">
        <h1><?= $animal["animal_race"] ?></h1>
    </div>
</section>


<section class="section_description">
    <div class="section_content_textImage">
        <h2>Notre <?= $animal["animal_race"] ?> </h2>
        <h3>Habitat</h3>
        <p><?= $animal["habitat_name"] ?></p>
        <h3>A propos de notre <?= $animal["animal_race"] ?></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio officia error.Illum quas ut molestiae labore
            , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio officia error.Illum quas ut molestiae labore
            , optio officia error</p>
    </div>
    <img src="/assets/images/flamingo.jpg" alt="flamingo">
</section>
<section class="section_description reverse">
    <div class="section_content_textImage">
        <h2>Avis du vétérinaire</h2>
        <h3>Condition de l'animal</h3>
        <p><?= $animal["animal_condition"] ?></p>
        <h3>Nourriture et grammage recommendée</h3>
        <p><?= $veterinarianOpinion["recommended_food"] ?> - <?= $veterinarianOpinion["recommended_food_weight"] ?></p>
        <h3>Détail de la condition de l'animal</h3>
        <p><?= $veterinarianOpinion["animal_condition_details"] ?></p>
        <h3>Date</h3>
        <p><?=$date?></p>
    </div>
    <img src="/assets/images/ecology.jpg" alt="Ecology Image">
</section>


<?php
require_once __DIR__ . "../../templates/footer.php";
?>