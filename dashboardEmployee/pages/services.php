<?php
require_once __DIR__ . "../../templates/header.php";

$services = getServices($pdo);

// $serviceName = $_POST['name'];
// $serviceDescription = $_POST['description'];

$errors = [];
$messages = [];

if (array_key_exists("addService", $_POST)) {
    $serviceName = $_POST['name'];
    $serviceDescription = $_POST['description'];
    if (iconv_strlen($serviceName) > 0 && iconv_strlen($serviceName) <= 255 && iconv_strlen($serviceDescription) > 0 && iconv_strlen($serviceDescription) <= 1000) {
        addService($pdo, $serviceName, $serviceDescription);
        $messages['addServiceMessage'] = "Ajout du service réussi !";
    } else {
        $errors["addServiceError"] = "Echec lors de la création du service !";
    }
}

?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les services</h1>
        <?php if (array_key_exists("addServiceError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["addServiceError"] ?></p>
            </div>
        <?php } else if (array_key_exists("addServiceMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["addServiceMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="table">
        <div class="table_head table_head_services">
            <div class="table_head_text">N°</div>
            <div class="table_head_text">Nom</div>
            <div class="table_head_text">Description</div>
            <div class="table_head_text">Actions</div>
        </div>
        <?php foreach ($services as $key => $service) { ?>

            <div class="table_body table_body_services <?php if ($key % 2 === 0) {
                                                            echo "striped";
                                                        } ?>">
                <div class="table_body_text"><?= $service['service_id'] ?></div>
                <div class="table_body_text"><?= $service['service_name'] ?></div>
                <div class="table_body_text"><?= $service['description'] ?></div>
                <div>
                    <a href="/dashboardEmployee/pages/service.php?service_id=<?= $service['service_id'] ?>" class="table_head_text actionButton">Modifier</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require_once __DIR__ . "../../templates/footer.php";
?>