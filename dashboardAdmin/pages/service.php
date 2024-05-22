<?php
require_once __DIR__ . "../../templates/header.php";

$service_id = $_GET['service_id'];
$service = getService($pdo, $service_id);

$errors = [];
$messages = [];

if (array_key_exists("updateService", $_POST)) {
    $serviceName = $_POST['name'];
    $serviceDescription = $_POST['description'];
    if(iconv_strlen($serviceName) > 0 && iconv_strlen($serviceName) <= 255 && iconv_strlen($serviceDescription) > 0 && iconv_strlen($serviceDescription) <= 1000){
        updateService($pdo, $serviceName, $serviceDescription, $service_id);
        $messages['updateServiceMessage'] = 'Modification réussie !';
    } else {
        $errors["updateServiceError"] = "Modification échouée !";
    }
}

if (array_key_exists("deleteService", $_POST)) {
    deleteService($pdo, $service_id);
    $messages['deleteServiceMessage'] = 'Suppression réussie !';
} else {
    $errors["deleteServiceError"] = "Suppression échouée !";
}

?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4"><?=$service['service_name']?></h1>
        <?php if (array_key_exists("updateServiceError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["updateServiceError"] ?></p>
            </div>
        <?php } else if (array_key_exists("updateServiceMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["updateServiceMessage"] ?></p>
            </div>
        <?php } else if (array_key_exists("deleteServiceMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["deleteServiceMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">
        <div class="section_form_input my-2">
            <label for="name">Nom du service</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$service['service_name']?>"/>
        </div>
        <div class="section_form_input">
            <label for="description">Description</label>
            <textarea type="textarea" class="form-control" id="description" name="description" rows="5" ><?=$service['description']?></textarea>
        </div>
        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="updateService">Modifier</button>
            <button class="button deleteButton" type="submit" name="deleteService">Supprimer</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>