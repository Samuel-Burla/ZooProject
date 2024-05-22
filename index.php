<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/functions.php";


// $images = getImages($pdo,1);
// $uneImage = $images[0]['image_data'];

// if($images){
//     // header("Content-type: image/jpeg");
//     // echo $uneImages;
// } 

// // var_dump($uneImage);


// if ($images) {
//     $uneImage = $images[0]['image_data'];
// } else {
//     // Handle the case when no images are found
//     echo "No image found";
//     exit; // Exit the script if no image is found
// }

$errors = [];
$messages = [];

if (array_key_exists("addComment", $_POST)) {
    $pseudo = $_POST['pseudo'];
    $comment = $_POST['comment'];
    if (iconv_strlen($pseudo) > 0 && iconv_strlen($pseudo) <= 50 && iconv_strlen($comment) > 0 && iconv_strlen($comment) <= 255) {
        addComment($pdo, $pseudo, $comment);
        $messages['addCommentMessage'] = "Ajout de l'animal réussi !";
        echo "<script type='text/javascript'>alert('Avis soummis avec succès !');</script>";
    } else {
        $errors["addCommentError"] = "Echec lors de l'ajout de l'animal !";
    }
}
// if($messages['addCommentMessage']){
//     // echo "<script type='text/javascript'>alert('Avis soummis avec succès !');</script>";
// }

$habitats = getHabitats($pdo);
?>

<section class="section_bigTitle">
    <img src="/assets/images/bigTitleHomeElephant.jpg" alt="Our Zoo">
    <div class="section_bigTitle_content">
        <h1>Découvrez notre magnifique Zoo</h1>
    </div>
</section>


<section class="section_description">
    <div class="section_content_textImage">
        <h2>Notre Merveilleux Zoo</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio officia error.Illum quas ut molestiae labore
            , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio officia error.Illum quas ut molestiae labore
            , optio officia error</p>
    </div>
    <img src="/assets/images/flamingo.jpg" alt="flamingo">
</section>
<section class="section_description reverse">
    <div class="section_content_textImage">
        <h2>Notre engagement écologique</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio officia error.Illum quas ut molestiae labore
            , optio officia errorLorem ipsum dolor sit amet consectetur adipisicing elit.
            Fugiat reprehenderit asperiores rerum dolorem facilis ipsam mollitia
            amet minima, fugit labore reiciendis sit? Illum quas ut molestiae labore
            , optio officia error.Illum quas ut molestiae labore
            , optio officia error</p>
    </div>
    <img src="/assets/images/ecology.jpg" alt="Ecology Image">
</section>


<section class="section_gallery">
    <h2>Les differents habitats</h2>
    <div class="section_gallery_content">
        <div class="section_gallery_images">
            <?php foreach ($habitats as $key => $habitat) { ?>
                <div class="section_gallery_images_img <?php if ($habitat["habitat_id"]==5 || $habitat["habitat_id"]==6) {
                    echo "mobile";
                } ?>">
                    <a href="/pages/habitat.php?id=<?= $habitat["habitat_id"] ?>"><!-- image --><img class="gallery_image" src="/assets/images/desert.jpg" alt="desert"></a>
                    <div class="section_gallery_images_img_content">
                        <h2><?= $habitat["habitat_name"] ?></h2>
                    </div>
                </div>
            <?php } ?>
            <!--<img class="gallery_image" src="/assets/images/tropicalForest2.jpg" alt="tropical forest">-->
            <!--<img class="gallery_image" src="/assets/images/savannah.jpg" alt="savannah">-->
            <!--<img class="gallery_image" src="/assets/images/polarZone.jpg" alt="polar zone">-->
            <!--<img class="gallery_image" src="/assets/images/ocean.jpg" alt="ocean">-->
            <!--<img class="gallery_image" src="/assets/images/mountain.jpg" alt="mountain">-->
        </div>
    </div>
    <div class="habitats_button">
        <a class="button" href="/pages/habitats.php">Voir les habitats</a>
    </div>
</section>

<section class="section_image">
    <img src="/assets/images/guide.jpg" alt="guide">
    <div class="section_image_content">
        <h2>Visite guidée</h2>
        <p class="section_image_content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            at alias quam, incidunt veritatis corrupti adipisci? Possimus
            assumenda ipsam voluptatem nostrum tempora magni natus hic id
            . Odiot.</p>
    </div>
</section>
<section class="section_image">
    <img src="/assets/images/train.jpg" alt="train">
    <div class="section_image_content">
        <h2>Petit tour en train</h2>
        <p class="section_image_content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit
            at alias quam, incidunt veritatis corrupti adipisci? Possimus
            assumenda ipsam voluptatem nostrum tempora magni natus hic id
            . Odiot.</p>
    </div>
</section>
<div class="services_button">
    <a class="button" href="/pages/services.php">Voir les services</a>
</div>

<section class="section_gallery">
    <h2>Les differents animaux</h2>
    <div class="section_gallery_content">
        <div class="section_gallery_images">
            <div class="section_gallery_images_img">
                <a href="#"><img class="gallery_image" src="/assets/images/andreas-rasmussen-NNe6epzHGm8-unsplash (1).jpg" alt="s"></a>
                <div class="section_gallery_images_img_content">
                    <h2>Zèbre</h2>
                </div>
            </div>
            <div class="section_gallery_images_img">
                <a href="#"><img class="gallery_image" src="/assets/images/andreas-rasmussen-NNe6epzHGm8-unsplash (1).jpg" alt="s"></a>
                <div class="section_gallery_images_img_content">
                    <h2>Lion</h2>
                </div>
            </div>
            <div class="section_gallery_images_img">
                <a href="#"><img class="gallery_image" src="/assets/images/andreas-rasmussen-NNe6epzHGm8-unsplash (1).jpg" alt="s"></a>
                <div class="section_gallery_images_img_content">
                    <h2>Tigre</h2>
                </div>
            </div>
            <div class="section_gallery_images_img">
                <a href="#"><img class="gallery_image" src="/assets/images/andreas-rasmussen-NNe6epzHGm8-unsplash (1).jpg" alt="s"></a>
                <div class="section_gallery_images_img_content">
                    <h2>Elephant</h2>
                </div>
            </div>
            <div class="section_gallery_images_img mobile">
                <a href="#"><img class="gallery_image" src="/assets/images/andreas-rasmussen-NNe6epzHGm8-unsplash (1).jpg" alt="s"></a>
                <div class="section_gallery_images_img_content">
                    <h2>Grenouille</h2>
                </div>
            </div>
            <div class="section_gallery_images_img mobile">
                <a href="#"><img class="gallery_image" src="/assets/images/andreas-rasmussen-NNe6epzHGm8-unsplash (1).jpg" alt="s"></a>
                <div class="section_gallery_images_img_content">
                    <h2>Aigle</h2>
                </div>
            </div>
        </div>
        <a class="button" href="/pages/habitats.php">Voir les habitats</a>
    </div>
</section>

<section class="section_comment">
    <h2>L'avis de nos visiteurs</h2>
    <div class="section_comment_card">
        <div class="section_comment_cards">
            <div class="section_comment_card_content">
                <img src="/assets/images/profile.jpg" alt="profile">
                <div class="section_comment_card_name ">
                    <h2>Samuel B.</h2>
                </div>
                <div class="section_comment_card_text">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta voluptates
                        aperiam omnis consectetur earum in iure! Sit amet animi sapiente praesentium
                        laudantium ullam nobis optio quibusdam similique fugiat. </p>
                </div>
            </div>

            <div class="section_comment_card_content">
                <img src="/assets/images/profile.jpg" alt="profile">
                <div class="section_comment_card_name ">
                    <h2>Samuel B.</h2>
                </div>
                <div class="section_comment_card_text">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta voluptates
                        aperiam omnis consectetur earum in iure! Sit amet animi sapiente praesentium
                        laudantium ullam nobis optio quibusdam similique fugiat. </p>
                </div>
            </div>

            <div class="section_comment_card_content">
                <img src="/assets/images/profile.jpg" alt="profile">
                <div class="section_comment_card_name ">
                    <h2>Samuel B.</h2>
                </div>
                <div class="section_comment_card_text">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta voluptates
                        aperiam omnis consectetur earum in iure! Sit amet animi sapiente praesentium
                        laudantium ullam nobis optio quibusdam similique fugiat. </p>
                </div>
            </div>
        </div>
        <a href="#" class="button" data-bs-toggle="modal" data-bs-target="#commentModal">Ecrire un commentaire</a>
    </div>
</section>

<!-- Comment Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <h2 class="m-2">Ajouter un animal</h2>
            <form class="section_form m-2" method="POST">
                <div class="section_form_input my-2">
                    <label for="pseudo">Pseudonyme</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" />
                </div>
                <div class="section_form_input">
                    <label for="comment">Commentaire</label>
                    <textarea type="text" class="form-control" id="comment" name="comment" rows="5"></textarea>
                </div>
                <div class="section_form_button mt-2">
                    <button class="button" type="submit" name="addComment">Ajouter le commentaire</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/templates/footer.php";
?>