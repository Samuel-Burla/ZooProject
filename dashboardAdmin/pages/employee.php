<?php
require_once __DIR__ . "../../templates/header.php";

$username = $_GET['username'];
$user = getUserAndRole($pdo, $username);

$errors = [];
$messages = [];

if (array_key_exists("updateUser", $_POST)) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role_id = $_POST['role_id'];
    if (iconv_strlen($first_name) > 0 && iconv_strlen($first_name) <= 255 && iconv_strlen($last_name) > 0 && iconv_strlen($last_name) <= 255 /* && $role_id == 2 || $role_id == 3*/) {
        updateUser($pdo, $first_name, $last_name, $username, $role_id);
        $messages['updateUserMessage'] = 'Modification réussie !';
    } else {
        $errors["updateUserError"] = "Modification échouée !";
    }
}

if (array_key_exists("deleteUser", $_POST)) {
    deleteUser($pdo, $username);
    $messages['deleteUserMessage'] = "Suppression réussie !";
} else {
    $errors["deleteUserError"] = "Suppression échouée !";
}

?>

<div class="container">
    <div class="d-flex flex-column">
        <h1 class="my-4"><?= $user['first_name'] ?> <?= $user['last_name'] ?></h1>
        <?php if (array_key_exists("updateUserError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["updateUserError"] ?></p>
            </div>
        <?php } else if (array_key_exists("updateUserMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["updateUserMessage"] ?></p>
            </div>
        <?php } else if (array_key_exists("deleteUserMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["deleteUserMessage"] ?></p>
            </div>
        <?php } ?>
    </div>
    <form class="section_form m-2" method="POST">
        <div class="section_form_input my-2">
            <label for="last_name">Nom</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $user['last_name'] ?>" />
        </div>
        <div class="section_form_input my-2">
            <label for="first_name">Prénom</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $user['first_name'] ?>" />
        </div>
        <div class="section_form_input">
            <label for="role_id">Role</label>
            <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $user['role_id'] ?>" />
            <div id="role_id" class="form-text">role_id: vétérinaire: 2, employé: 3.</div>
        </div>
        <div class="section_form_button mt-2">
            <button class="button" type="submit" name="updateUser">Modifier l'utilisateur</button>
            <button class="button deleteButton" type="submit" name="deleteUser">Supprimer l'utilisateur</button>
        </div>
    </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>