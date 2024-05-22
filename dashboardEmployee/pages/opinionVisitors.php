<?php
require_once __DIR__ . "../../templates/header.php";

$opinions = getVisitorsOpinions($pdo);
?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="my-4">Les avis des visiteurs</h1>
    </div>
    <div class="table">
        <div class="table_head table_head_opinions_visitors">
            <div class="table_head_text">N°</div>
            <div class="table_head_text">Pseudo</div>
            <div class="table_head_text">Comentaire</div>
            <div class="table_head_text">Visibilité</div>
            <div class="table_head_text">Actions</div>
        </div>
        <?php foreach ($opinions as $key => $opinion) { ?>

            <div class="table_body table_body_opinions_visitors <?php if ($key % 2 === 0) {
                                                                    echo "striped";
                                                                } ?>">
                <div class="table_body_text"><?= $opinion['opinion_id'] ?></div>
                <div class="table_body_text"><?= $opinion['pseudo'] ?></div>
                <div class="table_body_text"><?= $opinion['comment'] ?></div>
                <div class="table_body_text"><?php if ($opinion["isVisible"] === 0) {
                                                    echo "Pas visible";
                                                } else {
                                                    echo "Visible";
                                                } ?></div>
                <div>
                    <a href="/dashboardEmployee/pages/opinionVisitorValidation.php?opinion_id=<?= $opinion['opinion_id'] ?>" class="table_head_text actionButton">Visibilité</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require_once __DIR__ . "../../templates/footer.php";
?>