<?php
require_once __DIR__ . "../../templates/header.php";
$animal_id = $_GET['animal_id'];
$animal = getAnimal($pdo, $animal_id);

$habitats = getHabitats($pdo);

$errors = [];
$messages = [];

if ($animal && array_key_exists("updateAnimal", $_POST)) {
    $animal_race = $_POST['animal_race'];
    $animal_condition = $animal['animal_condition'];
    $habitat_id = $_POST['habitat_id'];
    $class_id = $_POST['class_id'];
    if(iconv_strlen($animal_race) > 0 && iconv_strlen($animal_race) <= 255 && $habitat_id > 0 && $habitat_id <= count($habitats) && $class_id > 0 && $class_id <= 5){
        updateAnimal($pdo, $animal_id, $animal_race, $animal_condition, $habitat_id, $class_id);
        $messages['updateAnimalMessage'] = 'Modification réussie !';
    } else {
        $errors["updateAnimalError"] = "Modification échouée !";
    }
} 
// else if(array_key_exists("updateAnimal", $_POST)){
//     $errors["updateAnimalError"] = "Modification échouée ! l'animal a été supprimé.";
// }

if (array_key_exists("deleteAnimal", $_POST)) {
    deleteAnimal($pdo, $animal_id);
    $messages['deleteAnimalMessage'] = 'Suppression réussie !';
} else {
    $errors["deleteAnimalError"] = "Suppression échouée !";
}

?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4"><?=$animal['animal_race']?></h1>
        <?php if (array_key_exists("updateAnimalError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["updateAnimalError"] ?></p>
            </div>
        <?php } else if (array_key_exists("updateAnimalMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["updateAnimalMessage"] ?></p>
            </div>
        <?php } else if (array_key_exists("deleteAnimalMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["deleteAnimalMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">
                <div class="section_form_input my-2">
                    <label for="animal_race">Race de l'animal</label>
                    <input type="text" class="form-control" id="animal_race" name="animal_race" value="<?=$animal['animal_race']?>"/>
                </div>
                <div class="section_form_input">
                    <label for="habitat_id">Habitat</label>
                    <input type="text" class="form-control" id="habitat_id" name="habitat_id" value="<?=$animal['habitat_id']?>" />
                    <div id="habitat_id" class="form-text">habitat_id: desert: 1, Forêt tropicale: 2, Savane: 3, Zone polaire: 4, Milieu marin: 5, Montagne: 6</div>
                </div>
                <div class="section_form_input">
                    <label for="class_id">Classe</label>
                    <input type="text" class="form-control" id="class_id" name="class_id" value="<?=$animal['class_id']?>"/>
                    <div id="class_id" class="form-text">Classe_id: mammifères: 1, oiseaux: 2, reptiles: 3, poissons: 4, amphibiens: 5</div>
                </div>
                <div class="section_form_button mt-2">
                    <button class="button" type="submit" name="updateAnimal">Modifier l'animal</button>
                    <button class="button deleteButton" type="submit" name="deleteAnimal">Supprimer l'animal</button>
                </div>
            </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>