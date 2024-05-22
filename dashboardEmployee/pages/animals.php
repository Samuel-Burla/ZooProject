<?php
require_once __DIR__ . "../../templates/header.php";
$animals = getAnimals($pdo);
$habitats = getHabitats($pdo);

?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les animaux</h1>
    </div>
    <div class="table">
        <div class="table_head table_head_animals">
            <div class="table_head_text">N°</div>
            <div class="table_head_text">Race</div>
            <div class="table_head_text">Condition</div>
            <div class="table_head_text">Habitat</div>
            <div class="table_head_text">Classe</div>
            <div class="table_head_text">Nourriture</div>
            <div class="table_head_text">Grammage</div>
            <div class="table_head_text">Actions</div>
        </div>
        <?php foreach ($animals as $key => $animal) { ?>

            <div class="table_body table_body_animals <?php if ($key % 2 === 0) {
                                                            echo "striped";
                                                        } ?>">
                <div class="table_body_text"><?= $animal['animal_id'] ?></div>
                <div class="table_body_text"><?= $animal['animal_race'] ?></div>
                <div class="table_body_text"><?= $animal['animal_condition'] ?></div>
                <div class="table_body_text"><?= $animal['habitat_name'] ?></div>
                <div class="table_body_text"><?= $animal['class_label'] ?></div>
                <div class="table_body_text"><?= $animal['food'] ?></div>
                <div class="table_body_text"><?= $animal['food_weight'] ?></div>
                <div>
                    <a href="/dashboardEmployee/pages/animal.php?animal_id=<?= $animal['animal_id'] ?>" class="table_head_text actionButton">Ajouter nourriture</a>

                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>