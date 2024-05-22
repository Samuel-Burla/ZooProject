<?php
require_once __DIR__ . "../../templates/header.php";
$animals = getAnimals($pdo);
$habitats = getHabitats($pdo);

$errors = [];
$messages = [];

if (array_key_exists("addAnimal", $_POST)) {
    $animal_race = $_POST['animal_race'];
    $habitat_id = $_POST['habitat_id'];
    $class_id = $_POST['class_id'];
    if (iconv_strlen($animal_race) > 0 && iconv_strlen($animal_race) <= 255 && $habitat_id > 0 && $habitat_id <= count($habitats) && $class_id > 0 && $class_id <= 5) {
        addAnimal($pdo, $animal_race, $habitat_id, $class_id);
        $messages['addAnimalMessage'] = "Ajout de l'animal réussi !";

    } else {
        $errors["addAnimalError"] = "Echec lors de l'ajout de l'animal !";
    }
}
?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les animaux</h1>
        <?php if (array_key_exists("addAnimalError", $errors)) { ?>
                <div class="section_form_error">
                    <p><?= $errors["addAnimalError"] ?></p>
                </div>
            <?php } else if (array_key_exists("addAnimalMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["addAnimalMessage"] ?></p>
            </div>
        <?php } ?>
        <a href="#" class="button p-2 me-2 h-50 text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un animal</a>
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
                    <a href="/dashboardAdmin/pages/animal.php?animal_id=<?= $animal['animal_id'] ?>" class="table_head_text actionButton">Modifier</a>
                    <a href="/dashboardAdmin/pages/animal.php?animal_id=<?= $animal['animal_id'] ?>" class="table_head_text actionButton deleteButton">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h2 class="m-2">Ajouter un animal</h2>
            <form class="section_form m-2" method="POST">
                <div class="section_form_input my-2">
                    <label for="animal_race">Nom de l'animal</label>
                    <input type="text" class="form-control" id="animal_race" name="animal_race" />
                </div>
                <div class="section_form_input">
                    <label for="habitat_id">Habitat</label>
                    <input type="text" class="form-control" id="habitat_id" name="habitat_id" />
                    <div id="habitat_id" class="form-text">role_id: vétérinaire: 2, employé: 3.</div>
                </div>
                <div class="section_form_input">
                    <label for="class_id">Classe</label>
                    <input type="text" class="form-control" id="class_id" name="class_id" />
                    <div id="class_id" class="form-text">role_id: vétérinaire: 2, employé: 3.</div>
                </div>
                <div class="section_form_button mt-2">
                    <button class="button" type="submit" name="addAnimal">Ajouter l'animal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>