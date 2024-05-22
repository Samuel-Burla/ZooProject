<?php
require_once __DIR__ . "../../templates/header.php";

$animal_id = $_GET['animal_id'];
$animal = getAnimal($pdo, $animal_id);

// $username = $_SESSION['username'];//email

// $dateInput = $_POST["date"];
// $timestamp = strtotime($dateInput);
// $nouvelleDate = date('d M Y, H:i', $timestamp);
// echo $nouvelleDate;

$errors = [];
$messages = [];

if ($animal && array_key_exists("addVeterinarianOpinion", $_POST)) {
    $animal_race = $animal['animal_race'];
    $animal_condition = $_POST['animal_condition'];
    $habitat_id = $animal['habitat_id'];
    $class_id = $animal['class_id'];

    $recommended_food = $_POST['recommended_food'];
    $recommended_food_weight = $_POST['recommended_food_weight'];
    $animal_condition_details = $_POST['animal_condition_details'];
    $username = $_POST['username'];
    $dateInput = $_POST['date'];
    $timestamp = strtotime($dateInput);
    // $date = new DateTime($dateInput);//('d m Y, H:i')
    if ($timestamp && $animal_id && iconv_strlen($recommended_food) > 0 && iconv_strlen($recommended_food) <= 255 && iconv_strlen($recommended_food_weight) > 0 && iconv_strlen($recommended_food_weight) <= 255 && iconv_strlen($animal_condition_details) > 0 && iconv_strlen($animal_condition_details) <= 255 && iconv_strlen($recommended_food) > 0 && iconv_strlen($recommended_food) <= 255 && iconv_strlen($username) > 0 && iconv_strlen($username) <= 255) {
        addVeterinarianOpinion($pdo, $recommended_food, $recommended_food_weight, $animal_condition_details, $username, $timestamp, $animal_id);
        updateAnimal($pdo, $animal_id, $animal_race, $animal_condition, $habitat_id, $class_id);
        $messages['addOpinionMessage'] = 'Ajout réussi !';
    } else {
        $errors["addOpinionError"] = "Ajout échouée !";
    }
}
//  else if (array_key_exists("updateAnimal", $_POST)) {
//     $errors["updateAnimalError"] = "Modification échouée ! l'animal a été supprimé.";
// }

// if (array_key_exists("deleteAnimal", $_POST)) {
//     deleteAnimal($pdo, $animal_id);
//     $messages['deleteAnimalMessage'] = 'Suppression réussie !';
// } else {
//     $errors["deleteAnimalError"] = "Suppression échouée !";
// }

?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4">Avis du vétérinaire - <?= $animal['animal_race'] ?></h1>
        <?php if (array_key_exists("addOpinionError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["addOpinionError"] ?></p>
            </div>
        <?php } else if (array_key_exists("addOpinionMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["addOpinionMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">
        <div class="section_form_input my-2">
            <label for="username">Adresse email</label>
            <input type="email" class="form-control" id="username" name="username" value="vien de $_SESSION" />
        </div>
        <div class="section_form_input my-2">
            <label for="animal_condition">Condition de l'animal</label>
            <input type="text" class="form-control" id="animal_condition" name="animal_condition" value="<?= $animal['animal_condition'] ?>" />
        </div>
        <div class="section_form_input my-2">
            <label for="recommended_food">Nourriture recommendée</label>
            <input type="text" class="form-control" id="recommended_food" name="recommended_food" placeholder="viande rouge" />
        </div>
        <div class="section_form_input my-2">
            <label for="recommended_food_weight">Grammage recommendé</label>
            <input type="text" class="form-control" id="recommended_food_weight" name="recommended_food_weight" placeholder="1kg/jour" />
        </div>
        <div class="section_form_input my-2">
            <label for="animal_condition_details">Détail de la condition de l'animal</label>
            <input type="text" class="form-control" id="animal_condition_details" name="animal_condition_details" />
        </div>
        <div class="section_form_input my-2">
            <label for="date">Date et heure</label>
            <input type="date" class="form-control" id="date" name="date" />
        </div>
        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="addVeterinarianOpinion">Ajouter un avis</button>
            <!--<button class="button deleteButton" type="submit" name="deleteAnimal">Voir les avis</button>-->
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>