<?php
require_once __DIR__ . "../../templates/header.php";

// var_dump($_FILES['file']['tmp_name']);

if(isset($_FILES['file']['tmp_name'])){
  addImage($pdo, $_FILES['file']['tmp_name'] ,  1 );
}

?>
<div class="m-4">
  <h1>images</h1>
  <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">habitat_id: 1:Savane, 2:...</div>
  </div>
  <button type="submit" name="addFile" class="btn btn-primary">Soummetre</button>
  </form>
</div>

<?php
require_once __DIR__ . "../../templates/footer.php";
?>