<?php
require_once __DIR__ . "../../templates/header.php";
$services = getServices($pdo);
?>
<section class="section_bigTitle">
    <img src="/assets/images/bigTitleHomeElephant.jpg" alt="Our Zoo">
    <div class="section_bigTitle_content">
        <h1>Découvrir <?= strtolower($menu[$headTitle]["headTitle"]) ?> du Zoo</h1>
    </div>
</section>

<?php foreach ($services as $key => $service) { ?>
    <section class="section_description <?php if ($key % 2 === 0) {echo "reverse";} ?>">
        <div class="section_content_textImage ">
            <h2><?= $service["service_name"] ?></h2>
            <p><?= $service["description"] ?></p>
        </div>
        <img src="/assets/images/flamingo.jpg" alt="flamingo"><!-- images even for Big Title -->
    </section>
<?php } ?>
<!-- <img src="/assets/images/ecology.jpg" alt="Ecology Image"> -->
<!-- <img src="/assets/images/flamingo.jpg" alt="flamingo"> -->

<?php
require_once __DIR__ . "../../templates/footer.php";?>