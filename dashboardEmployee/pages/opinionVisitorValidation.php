<?php
require_once __DIR__ . "../../templates/header.php";
$opinion_id = $_GET['opinion_id'];
$opinion = getVisitorsOpinion($pdo, $opinion_id);

$errors = [];
$messages = [];

if (array_key_exists("validateOpinion", $_POST)) {
    validateVisitorsOpinions($pdo, $opinion_id);
    $messages['validateOpinionMessage'] = "Validation réussie !";
}
// else{
//     $errors["validateOpinionError"] = "Validation échouée !";
// }
if (array_key_exists("invalidateOpinion", $_POST)) {
    invalidateVisitorsOpinions($pdo, $opinion_id);
    $messages['invalidateOpinionMessage'] = "Invalidation réussie !";
}
// else {
//     $errors["invalidateOpinionError"] = "Invalidation échouée !";
// }
?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4">Modifier la visibilité</h1>
        <?php if (array_key_exists("validateOpinionError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["validateOpinionError"] ?></p>
            </div>
        <?php } else if (array_key_exists("validateOpinionMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["validateOpinionMessage"] ?></p>
            </div>
        <?php } else if (array_key_exists("invalidateOpinionError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["invalidateOpinionError"] ?></p>
            </div>
        <?php } else if (array_key_exists("invalidateOpinionMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["invalidateOpinionMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">

        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="validateOpinion">Visible
            </button>
            <button class="button deleteButton" type="submit" name="invalidateOpinion">Pas visible
            </button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>