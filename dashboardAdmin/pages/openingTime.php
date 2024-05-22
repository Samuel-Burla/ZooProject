<?php
require_once __DIR__ . "../../templates/header.php";
$opening_time = getOpeningTime($pdo);

$errors = [];
$messages = [];

if (array_key_exists("updateOpeningTime", $_POST)) {
    $monday = $_POST['monday'];
    $tuesday = $_POST['tuesday'];
    $wednesday = $_POST['wednesday'];
    $thursday = $_POST['thursday'];
    $friday = $_POST['friday'];
    $saturday = $_POST['saturday'];
    $sunday = $_POST['sunday'];
    if (iconv_strlen($monday) > 0 && iconv_strlen($monday) <= 50 && iconv_strlen($tuesday) > 0 && iconv_strlen($tuesday) <= 50 && iconv_strlen($wednesday) > 0 && iconv_strlen($wednesday) <= 50 && iconv_strlen($thursday) > 0 && iconv_strlen($thursday) <= 50 && iconv_strlen($friday) > 0 && iconv_strlen($friday) <= 50 && iconv_strlen($saturday) > 0 && iconv_strlen($saturday) <= 50 && iconv_strlen($sunday) > 0 && iconv_strlen($sunday) <= 50) {
        updateOpeningTime($pdo, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);
        $messages['updateOpeningTimeMessage'] = 'Modification réussie !';
    } else {
        $errors["updateOpeningTimeError"] = "Modification échouée !";
    }
} 
?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4">L'horaire</h1>
        <?php if (array_key_exists("updateOpeningTimeError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["updateOpeningTimeError"] ?></p>
            </div>
        <?php } else if (array_key_exists("updateOpeningTimeMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["updateOpeningTimeMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form d-grid" method="POST">
        <div class="section_form_input">
            <label for="monday">Lundi</label>
            <input type="text" class="form-control" id="monday" name="monday" value="<?= $opening_time['monday'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="tuesday">Mardi</label>
            <input type="text" class="form-control" id="tuesday" name="tuesday" value="<?= $opening_time['tuesday'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="wednesday">Mercredi</label>
            <input type="text" class="form-control" id="wednesday" name="wednesday" value="<?= $opening_time['wednesday'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="thursday">Jeudi</label>
            <input type="text" class="form-control" id="thursday" name="thursday" value="<?= $opening_time['thursday'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="friday">Vendredi</label>
            <input type="text" class="form-control" id="friday" name="friday" value="<?= $opening_time['friday'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="saturday">Samedi</label>
            <input type="text" class="form-control" id="saturday" name="saturday" value="<?= $opening_time['saturday'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="sunday">Dimanche</label>
            <input type="text" class="form-control" id="sunday" name="sunday" value="<?= $opening_time['sunday'] ?>" />
        </div>
        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="updateOpeningTime">Modifier l'horaire</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>