<?php
require_once __DIR__ . "../../templates/header.php";
$animal_id = $_GET['animal_id'];
$animal = getAnimal($pdo, $animal_id);

$habitats = getHabitats($pdo);

$errors = [];
$messages = [];

var_dump($_POST);

if ($animal && array_key_exists("updateEmployeeFoodDetails", $_POST)) {
    $food = $_POST['food'];
    $food_weight = $_POST['food_weight'];
    $food_date_time = strtotime($_POST["food_date_time"]);
    if($food && $food_weight && $food_date_time){
        if (strlen($food) > 0 && strlen($food) <= 255 && strlen($food_weight) > 0 && strlen($food_weight) <= 255 && $food_date_time > 0) {
            updateAnimalFoodDetails($pdo, $animal_id, $food, $food_weight, $food_date_time);
            $messages['updateAnimalFoodDetailsMessage'] = 'Ajout réussi !';
        } else {
            $errors["updateAnimalFoodDetailsError"] = "Ajout échoué !";
        }
    }
}
// else if(array_key_exists("updateAnimal", $_POST)){
//     $errors["updateAnimalError"] = "Modification échouée ! l'animal a été supprimé.";
// }

?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4">Ajout de la nourriture - <?= $animal['animal_race'] ?></h1>
        <?php if (array_key_exists("updateAnimalFoodDetailsError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["updateAnimalFoodDetailsError"] ?></p>
            </div>
        <?php } else if (array_key_exists("updateAnimalFoodDetailsMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["updateAnimalFoodDetailsMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">
        <div class="section_form_input my-2">
            <label for="username">Adresse email</label>
            <input type="email" class="form-control" id="username" name="username" value="Denis.Avenall@mail.com" />
        </div>
        <div class="section_form_input my-2">
            <label for="food">Nourriture</label>
            <input type="text" class="form-control" id="food" name="food" placeholder="viande rouge" />
        </div>
        <div class="section_form_input my-2">
            <label for="food_weight">Grammage</label>
            <input type="text" class="form-control" id="food_weight" name="food_weight" placeholder="1kg/jour" />
        </div>
        
        <div class="section_form_input my-2">
            <label for="food_date_time">Date et heure</label>
            <input type="datetime-local" class="form-control" id="food_date_time" name="food_date_time" />
        </div>
        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="updateEmployeeFoodDetails">Ajouter une consommation de nourriture
            </button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>