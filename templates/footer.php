<?php

$opening_time = getOpeningTime($pdo)


?>

</main>
<footer>
    <div class="footer_content">
        <h2>
            Horaire d'ouverture
        </h2>
        <p>Lundi : <?= $opening_time["monday"] ?> <br>
            Mardi : <?= $opening_time["tuesday"] ?><br>
            Mercredi : <?= $opening_time["wednesday"] ?><br>
            Jeudi : <?= $opening_time["thursday"] ?><br>
            Vendredi : <?= $opening_time["friday"] ?><br>
            Samedi : <?= $opening_time["saturday"] ?><br>
            Dimanche : <?= $opening_time["sunday"] ?></p>
    </div>
    <div class="footer_content">
        <h2>Contact</h2>
        <p>Adresse : Rue Arcadia 32, 75 Paris</p>
        <p>Email: Arcadia@mail.com</p>
        <p>Tel : +33 0000 00 00 00</p>
    </div>
</footer>
<script src="/assets/js/script.js"></script>
<script src="/assets/bootstrap/js/bootstrap.js"></script>
</body>

</html>