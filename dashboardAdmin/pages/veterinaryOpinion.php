<?php
require_once __DIR__ . "../../templates/header.php";

$veterinary_opinions = getVeterinarianOpinions($pdo);
?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les comptes rendus des vétérinaires</h1>
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
        <?php foreach ($veterinary_opinions as $key => $veterinary_opinion) {
            $animal_id = $veterinary_opinion["animal_id"];
            $animal = getAnimal($pdo, $animal_id);
            $animal['animal_race'] ?>
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
            </div>
        <?php } ?>
    </div>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>