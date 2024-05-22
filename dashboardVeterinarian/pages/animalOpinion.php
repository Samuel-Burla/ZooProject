<?php
require_once __DIR__ . "../../templates/header.php";


$animal_id = $_GET['animal_id'];
$animal = getAnimal($pdo, $animal_id);

$veterinary_opinions = getVeterinarianOpinions($pdo);



// $habitats = getHabitats($pdo);
// var_dump($veterinary_opinions);
$errors = [];
$messages = [];



// if (array_key_exists("addAnimal", $_POST)) {
//     $animal_race = $_POST['animal_race'];
//     $habitat_id = $_POST['habitat_id'];
//     $class_id = $_POST['class_id'];
//     if (iconv_strlen($animal_race) > 0 && iconv_strlen($animal_race) <= 255 && $habitat_id > 0 && $habitat_id <= count($habitats) && $class_id > 0 && $class_id <= 5) {
//         addAnimal($pdo, $animal_race, $habitat_id, $class_id);
//         $messages['addAnimalMessage'] = "Ajout de l'animal réussi !";
//     } else {
//         $errors["addAnimalError"] = "Echec lors de l'ajout de l'animal !";
//     }
// }
?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Notre <?= $animal['animal_race'] ?></h1>
    </div>
    <div class="table">
        <div class="table_head table_head_opinion_animals">
            <div class="table_head_text">N°</div>
            <div class="table_head_text">Race</div>
            <div class="table_head_text">Nourriture recommendée</div>
            <div class="table_head_text">Grammage recommendée</div>
            <div class="table_head_text">Détail Condition animal</div>
            <div class="table_head_text">Vétérinaire</div>
            <div class="table_head_text">Date</div>
            <!--<div class="table_head_text">Actions</div>-->
        </div>
        <?php foreach ($veterinary_opinions as $key => $veterinary_opinion) { ?>

            <div class="table_body table_body_opinion_animals <?php if ($key % 2 === 0) {
                                                            echo "striped";
                                                        } ?>">
                <div class="table_body_text"><?= $veterinary_opinion['veterinary_opinion_id'] ?></div>
                <div class="table_body_text"><?= $animal['animal_race'] ?></div>
                <div class="table_body_text"><?= $veterinary_opinion['recommended_food'] ?></div>
                <div class="table_body_text"><?= $veterinary_opinion['recommended_food_weight'] ?></div>
                <div class="table_body_text"><?= $veterinary_opinion['animal_condition_details'] ?></div>
                <div class="table_body_text"><?= $veterinary_opinion['username'] ?></div>
                <div class="table_body_text"><?= date('d M Y', $veterinary_opinion['date']) ?></div>
                <!--<div>
                    <a href="/veterinarian/pages/animal.php?animal_id=<?= $animal['animal_id'] ?>" class="table_head_text actionButton">Ecrire un avis</a>
                    <a href="/veterinarian/pages/animalOpinion.php" class="table_head_text actionButton">Voir les avis</a>
                </div>-->
            </div>
        <?php } ?>
    </div>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>