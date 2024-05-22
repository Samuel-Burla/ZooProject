<?php
require_once __DIR__ . "../../templates/header.php";

$users = getUsers($pdo);

$errors = [];
$messages = [];

if (array_key_exists("addUser", $_POST)) {
    if ($_POST['role_id'] != 1) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];
        if (iconv_strlen($first_name) > 0 && iconv_strlen($first_name) <= 255 && iconv_strlen($last_name) > 0 && iconv_strlen($last_name) <= 255 && iconv_strlen($username) > 0 && iconv_strlen($username) <= 255 &&  iconv_strlen($password) > 0 && iconv_strlen($password) <= 255 && $role_id == 2 || $role_id == 3) {
            addUser($pdo, $first_name, $last_name, $username, $password, $role_id);
            $messages['addUserMessage'] = "Ajout de l'utilisateur réussi !";
        } else {
            $errors["addUserError"] = "Erreur lors de la creation de compte utilisateur !";
        }
    } else {
        $errors["addUserError"] = "Erreur lors de la creation de compte utilisateur !";
    }
}



?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les employés</h1>
        <?php if (array_key_exists("addUserError", $errors)) { ?>
            <div class="section_form_error">
                <p><?= $errors["addUserError"] ?></p>
            </div>
        <?php } else if (array_key_exists("addUserMessage", $messages)) { ?>
            <div class="section_form_message">
                <p><?= $messages["addUserMessage"] ?></p>
            </div>
        <?php } ?>
        <a href="#" class="button p-2 me-2 h-50 text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un utilisateur </a>
    </div>
    <div class="table">
        <div class="table_head table_head_employee">
            <div class="table_head_text">Email</div>
            <div class="table_head_text">Nom</div>
            <div class="table_head_text">Prénom</div>
            <div class="table_head_text">Statut</div>
            <div class="table_head_text">Actions</div>
        </div>
        <?php foreach ($users as $key => $user) { ?>
            <?php if ($user["role_label"] != "admin") { ?>
                <div class="table_body table_head_employee <?php if ($key % 2 === 0) {
                                                                echo "striped";
                                                            } ?>">
                    <div class="table_body_text"><?= $user['username'] ?></div>
                    <div class="table_body_text"><?= $user['last_name'] ?></div>
                    <div class="table_body_text"><?= $user['first_name'] ?></div>
                    <div class="table_body_text"><?= $user['role_label'] ?></div>
                    <div>
                        <a href="/dashboardAdmin/pages/employee.php?username=<?= $user['username'] ?>" class="table_head_text actionButton">Modifier</a>
                        <a href="/dashboardAdmin/pages/employee.php?username=<?= $user['username'] ?>" class="table_head_text actionButton deleteButton">Supprimer</a>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h2 class="m-2">Ajouter un employé</h2>
            <form class="section_form m-2" method="POST">
                <div class="section_form_input my-2">
                    <label for="last_name">Nom</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" />
                </div>
                <div class="section_form_input my-2">
                    <label for="first_name">Prénom</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" />
                </div>
                <div class="section_form_input my-2">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="username" name="username" />
                </div>
                <div class="section_form_input my-2">
                    <label for="password">Mot de passe</label>
                    <input type="text" class="form-control" id="password" name="password" />
                </div>
                <div class="section_form_input">
                    <label for="role_id">Role</label>
                    <input type="text" class="form-control" id="role_id" name="role_id" />
                    <div id="emailHelp" class="form-text">role_id: vétérinaire: 2, employé: 3.</div>
                </div>
                <div class="section_form_button mt-2">
                    <button class="button" type="submit" name="addUser">Ajouter l'utilisateur</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>