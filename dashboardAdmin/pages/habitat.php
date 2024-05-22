<?php
require_once __DIR__ . "../../templates/header.php";

$habitat_id = $_GET['habitat_id'];
$habitat = getHabitat($pdo, $habitat_id);

$errors = [];
$messages = [];

if (array_key_exists("updateHabitat", $_POST)) {
    $habitat_name = $_POST['habitat_name'];
    $description = $_POST['description'];
    if (iconv_strlen($habitat_name) > 0 && iconv_strlen($habitat_name) <= 255 && iconv_strlen($description) > 0 && iconv_strlen($description) <= 1000) {
        updateHabitat($pdo, $habitat_name, $description, $habitat_id);
        $messages['updateHabitatMessage'] = 'Modification réussie !';
    } else {
        $errors["updateHabitatError"] = "Modification échouée !";
    }
}

if (array_key_exists("deleteHabitat", $_POST)) {
    deleteHabitat($pdo, $habitat_id);
    $messages['deleteHabitatMessage'] = 'Suppression réussie !';
}
// else {
//     $errors["deleteHabitatError"] = "Suppression échouée !";
// }

?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4"><?= $habitat['habitat_name'] ?></h1>
        <?php if (array_key_exists("updateHabitatError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["updateHabitatError"] ?></p>
            </div>
        <?php } else if (array_key_exists("updateHabitatMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["updateHabitatMessage"] ?></p>
            </div>
        <?php } else if (array_key_exists("deleteHabitatMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["deleteHabitatMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">
        <div class="section_form_input my-2">
            <label for="habitat_name">Nom de l'habitat</label>
            <input type="text" class="form-control" id="habitat_name" name="habitat_name" value="<?= $habitat['habitat_name'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="description">Decription</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5" ><?= $habitat['description'] ?></textarea>
        </div>
        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="updateHabitat">Modifier l'habitat</button>
            <button class="button deleteButton" type="submit" name="deleteHabitat">Supprimer l'habitat</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>