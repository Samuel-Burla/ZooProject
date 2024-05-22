<?php
require_once __DIR__ . "../../templates/header.php";

if (array_key_exists("id", $_GET)) {
    $allHabitats = getHabitats($pdo);
    $allHabitatsLenght = count($allHabitats);
    $habitatId = $_GET["id"];
    if ($allHabitatsLenght >= $habitatId && $habitatId!=0) {
        $habitat = getHabitat($pdo, $habitatId);
    } else {
        header('Location: /pages/error404.php');
    }
} else {
    header('Location: /pages/error404.php');
}

$animals = getAnimalsByHabitat($pdo, $habitatId);


?>

<section class="section_bigTitle">
    <img src="/assets/images/bigTitleHomeElephant.jpg" alt="Our Zoo">
    <div class="section_bigTitle_content">
        <h1><?= $habitat["habitat_name"] ?></h1>
    </div>
</section>


<section class="section_description">
    <div class="section_content_textImage">
        <h2>A la découverte de ce milieu</h2>
        <p><?= $habitat["description"] ?></p>
    </div>
    <img src="/assets/images/flamingo.jpg" alt="flamingo"><!-- image -->
</section>

<section class="section_animals">
    <h2>Les differents animaux</h2>
    <div class="section_animals_card">
        <div class="section_animals_cards">

            <?php foreach ($animals as $key => $animal) { ?>

                <div class="section_animals_card_content">
                    <img src="/assets/images/profile.jpg" alt="profile">
                    <div class="section_animals_card_name ">
                        <h2><?= $animal["animal_race"] ?></h2>
                    </div>
                    <div class="section_animals_card_text">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta voluptates
                            aperiam omnis consectetur earum in iure! Sit amet animi sapiente praesentium
                            laudantium ullam nobis optio quibusdam similique fugiat. </p>
                    </div>
                    <a class="button animal_card_button" href="/pages/animal.php?id=<?= $animal['animal_id'] ?>">Voir l'animal</a>
                </div>

            <?php } ?>

        </div>
    </div>
</section>


<?php
require_once __DIR__ . "../../templates/footer.php"; ?>