<?php
require_once __DIR__ . "../../templates/header.php";
$habitats = getHabitats($pdo);

$errors = [];
$messages = [];

if (array_key_exists("addHabitat", $_POST)) {
    $habitat_name = $_POST['habitat_name'];
    $description = $_POST['description'];
    if (iconv_strlen($habitat_name) > 0 && iconv_strlen($habitat_name) <= 255 && iconv_strlen($description) > 0 && iconv_strlen($description) <= 1000) {
        addHabitat($pdo, $habitat_name, $description);
        $messages['addHabitatMessage'] = "Ajout de l'habitat réussi !";
    } else {
        $errors["addHabitatError"] = "Echec lors de la création de l'habitat !";
    }
}

?>


<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les habitats</h1>
        <?php if (array_key_exists("addHabitatError", $errors)) { ?>
                <div class="section_form_error">
                    <p><?= $errors["addHabitatError"] ?></p>
                </div>
            <?php } else if (array_key_exists("addHabitatMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["addHabitatMessage"] ?></p>
            </div>
        <?php } ?>
        <a href="#" class="button p-2 me-2 h-50 text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un habitat</a>
    </div>
    <div class="table">
        <div class="table_head table_head_habitats">
            <div class="table_head_text">N°</div>
            <div class="table_head_text">Nom</div>
            <div class="table_head_text">Description</div>
            <div class="table_head_text">Commentaires</div>
            <div class="table_head_text">Images</div>
            <div class="table_head_text">Actions</div>
        </div>
        <?php foreach ($habitats as $key => $habitat) { ?>

            <div class="table_body table_body_habitats <?php if ($key % 2 === 0) {
                                                            echo "striped";
                                                        } ?>">
                <div class="table_body_text"><?= $habitat['habitat_id'] ?></div>
                <div class="table_body_text"><?= $habitat['habitat_name'] ?></div>
                <div class="table_body_text"><?= $habitat['description'] ?></div>
                <div class="table_body_text"><?= $habitat['habitat_comment'] ?></div>
                <div class="table_head_text"><?= $habitat['image_id'] ?></div>
                <div>
                    <a href="/dashboardAdmin/pages/habitat.php?habitat_id=<?= $habitat['habitat_id'] ?>" class="table_head_text actionButton">Modifier</a>
                    <a href="/dashboardAdmin/pages/habitat.php?habitat_id=<?= $habitat['habitat_id'] ?>" class="table_head_text actionButton deleteButton">Supprimer</a>
                </div>
            </div>


        <?php } ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h2 class="m-2">Ajouter un habitat</h2>
            <form class="section_form m-2" method="POST">
                <div class="section_form_input my-2">
                    <label for="habitat_name">Nom de l'habitat</label>
                    <input type="text" class="form-control" id="habitat_name" name="habitat_name" />
                </div>
                <div class="section_form_input">
                    <label for="description">Decription</label>
                    <input type="text" class="form-control" id="description" name="description" />
                </div>
                <div class="section_form_button mt-2">
                    <button class="button" type="submit" name="addHabitat">Ajouter l'habitat</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . "../../templates/footer.php";
?>